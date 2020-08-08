from flask import Flask,request 
from insert import insert_transaction_data,insert_ngo_data
app = Flask(__name__)


@app.route('/insertRequest',method=['POST'])
def insertRequest():    
    output = request.json        
    try:
        insert_transaction_data(output)
        return {'result':'Successfully Inserted'}
    except:
        return {'result':'Failed'}
    
    
@app.route('/insertNGOData',method=['POST'])
def insertNGOData():    
    output = request.json        
    try:
        insert_ngo_data(output)
        return {'result':'Successfully Inserted'}
    except:
        return {'result':'Failed'}
        
@app.route('/updateTransactionData',method=['POST'])
def update_transaction_data():    
    output = request.json        
    try:
        insert_ngo_data(output)
        return {'result':'Successfully Inserted'}
    except:
        return {'result':'Failed'}
        

@app.route('/showUserTransactionData',method=['POST'])
def show_transaction_data():    
    output = request.json        
    try:
        insert_ngo_data(output)
        return {'result':'Successfully Inserted'}
    except:
        return {'result':'Failed'}
    

    
@app.route('/showUserRequestData',method=['POST'])
def show_request_data():    
    output = request.json        
    try:
        insert_ngo_data(output)
        return {'result':'Successfully Inserted'}
    except:
        return {'result':'Failed'}
        


if __name__ == '__main__':
    app.run(debug=True)        