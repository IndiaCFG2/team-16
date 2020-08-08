from flask import Flask,request 
from insert import insert_transaction_data,insert_ngo_data,update_transaction_data,show_transaction_data,show_request_data
app = Flask(__name__)


@app.route('/insertRequest',methods=['POST'])
def insertRequest():    
    output = request.json        
    try:
        insert_transaction_data(output)
        return {'result':'Successfully Inserted'}
    except:
        return {'result':'Failed'}
    
    
@app.route('/insertNGOData',methods=['POST'])
def insertNGOData():    
    output = request.json        
    try:
        insert_ngo_data(output)
        return {'result':'Successfully Inserted'}
    except:
        return {'result':'Failed'}
        
@app.route('/updateTransactionData',methods=['POST'])
def updateTransactionData():    
    output = request.json        
    try:
        update_transaction_data(output)
        return {'result':'Successfully Inserted'}
    except:
        return {'result':'Failed'}
        

@app.route('/showUserTransactionData',methods=['POST'])
def showUserTransactionData():    
    output = request.json        
    try:
        return show_transaction_data(output)
    except:
        return {'result':'Failed'}
    

    
@app.route('/showUserRequestData',methods=['POST'])
def showUserRequestData():    
    output = request.json        
    try:
        return show_request_data(output)
    except:
        return {'result':'Failed'}
        


if __name__ == '__main__':
    app.run(debug=True)        