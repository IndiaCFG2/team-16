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
   output_val = collection.find({'REQUEST_ID' : obj['REQUEST_ID']})
   val = output_val['QUANTITIES']
   if(val> obj['ITEMS']):
       val = val - obj['ITEMS']
       return {'result' : 'success'}
   elif(val == obj['ITEMS'] or val < obj['ITEMS']):
       collection.aggregate([{
               '$match' : {'REQUEST_ID' : obj['REQUEST_ID']},
               '$set' : {'STATUS' : 'completed'}             
       }])
   if val<obj['ITEMS']:
       return {'result' : 'demand already fulfilled, try for different request'}
   else:
       return {'result' : 'success'}
            
   
   
   

def insert_ngo_data(obj):         
   collection = db.ngo_request
   count = collection.count()
   insert_data = {}
   insert_data['REQUEST_ID'] = count+1
   insert_data['NGO_NAME'] = obj['NGO_NAME']
   insert_data['PRODUCT_TYPE'] = obj['PRODUCT_TYPE']
   insert_data['PRODUCT_SUB_TYPE'] = obj['PRODUCT_SUB_TYPE']
   insert_data['QUANTITIES']  = obj['QUANTITIES']
   insert_data['DESC'] = obj['DESC']
   insert_data['STATUS'] = 'created'
   insert_data['LOCATION'] = obj['LOCATION']
   
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
                '$match'  : {'$or' : [{'STATUS' : 'created'},{'STATUS':'intransit'}]}
                }])
    
        return output
    except:
        return {}
    
    