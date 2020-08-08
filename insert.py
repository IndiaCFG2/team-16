from pymongo import MongoClient
from datetime import datetime
client = MongoClient('mongodb://localhost:27017/')
db = client.team16


def update_transaction_data(obj):
    collection = db.requests
    collection.aggregate([{
            '$match' : {'TRANSACTION_ID': obj['TRANSACTION_ID']},
            '$set' : {'TRACKING_STATUS' : obj['TRACKING_STATUS']}
            }])    


def insert_transaction_data(obj):
   collection = db.requests 
   count = collection.count()
   insert_val = {}
   insert_val['TRANSACTION_ID'] = count+1;
   insert_val['NGO_NAME'] = obj['NGO_NAME']
   insert_val['DONAR_NAME'] = obj['DONAR_NAME']
   if 'DONAR_EMAIL' in obj.keys():
       insert_val['DONAR_EMAIL'] = obj['DONAR_EMAIL']
   if 'DONAR_ADDRESS' in obj.keys():
       insert_val['DONAR_ADDRESS'] = obj['DONAR_ADDRESS']
   if 'DONAR_CITY' in obj.keys():
       insert_val['DONAR_CITY'] = obj['DONAR_CITY']
   insert_val['TRACKING_STATUS'] = 'created'
   insert_val['ITEMS'] = obj['ITEMS']
   insert_val['CATEGORY'] = obj['CATEGORY']
   insert_val['SUB_CATEGORY'] = obj['SUB_CATEGORY']
   insert_val['DESCRIPTION'] = obj['DESCRIPTION']
   insert_val['REQUEST_GENERATION_TIME'] = datetime.now()
   collection.insert_one(insert_val)
   collection = db.ngo_request
   output_val = collection.find({'request_id' : obj['request_id']})
   val = output_val['quantities']
   if(val> obj['ITEMS']):
       val = val - obj['ITEMS']
       return {'resut' : 'success'}
   elif(val == obj['ITEMS'] or val < obj['ITEMS']):
       collection.aggregate([{
               '$match' : {'request_id' : obj['request_id']},
               '$set' : {'status' : 'completed'}             
       }])
   if val<obj['ITEMS']:
       return {'result' : 'demand already fulfilled, try for different request'}
   else:
       return {'result' : 'success'}
            
   
   
   

def insert_ngo_data(obj):         
   collection = db.ngo_request
   count = collection.count()
   insert_data = {}
   insert_data['request_id'] = count+1
   insert_data['Ngo_name'] = obj['Ngo_name']
   insert_data['product_type'] = obj['product_type']
   insert_data['product_sub_type'] = obj['product_sub_type']
   insert_data['quantities']  = obj['quantities']
   insert_data['desc'] = obj['desc']
   insert_data['status'] = 'created'
   insert_data['location'] = obj['location']
   
def show_transaction_data(obj):
    collection = db.requests
    try:
        output =  collection.aggregate([{
            '$match' : {'DONAR_NAME' : obj['DONAR_NAME']}
            }])
        return output
    except:
        return {}
       
 
def show_request_data(obj): 
    collection = db.ngo_request
    try:
        output = collection.aggregate([{
                '$match'  : {'$or' : [{'status' : 'created'},{'status':'intransit'}]}
                }])
    
        return output
    except:
        return {}
    
    