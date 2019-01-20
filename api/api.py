from flask import Flask, request
from json import dumps, loads
from rediscluster import StrictRedisCluster

app = Flask(__name__)

nodes = [{"host": "192.168.33.21", "port": "6379"}, {"host": "192.168.33.22", "port": "6380"}, {"host": "192.168.33.23", "port": "6381"}]
rc = StrictRedisCluster(startup_nodes=nodes, decode_responses=True)

@app.route('/<date>', methods=['GET'])
def getCargoByDate(date):
	print ('Getting data from redis : Date ' + date + '...')
	pattern = 'date:'+date+':*'
	keys = rc.keys(pattern)
	res = []
	for key in keys:
		val = rc.hgetall(key)
		res.append(val)
	response = app.response_class(response=dumps(res), status=200, mimetype='application/json')
	return response

@app.route('/<date>', methods=['POST'])
def storeDate(date):
	print('Caching redis : Date ' + date + '...')
	data = request.get_json()[0]
	data = loads(data)
	for item in data:
		pattern = 'date:'+date+':'+str(item['id'])
		ins_data = {
			'id' : item['id'],
			'DataExtractDate' : item['DataExtractDate'],
			'ReportPeriod' : item['ReportPeriod'],
			'Arrival_Departure' : item['Arrival_Departure'],
			'Domestic_International' : item['Domestic_International'],
			'CargoType' : item['CargoType'],
			'AirCargoTons' : item['AirCargoTons']
		}
		ins = rc.hmset(pattern, ins_data)
	return dumps(data)

@app.route('/arrival', methods=['GET'])
def getArrival():
	print('Getting data from redis... (Arrival)')
	pattern = 'Arrival:*'
	keys = rc.keys(pattern)
	res = []
	for key in keys:
		val = rc.hgetall(key)
		res.append(val)
	response = app.response_class(response=dumps(res), status=200, mimetype='application/json')
	return response

@app.route('/storeArrival', methods=['POST'])
def storeArrival():
	print('Caching redis... (Arrival)')
	data = request.get_json()[0]
	data = loads(data)
	for item in data:
		pattern = 'Arrival:'+str(item['id'])
		ins_data = {
			'id' : item['id'],
			'DataExtractDate' : item['DataExtractDate'],
			'ReportPeriod' : item['ReportPeriod'],
			'Arrival_Departure' : item['Arrival_Departure'],
			'Domestic_International' : item['Domestic_International'],
			'CargoType' : item['CargoType'],
			'AirCargoTons' : item['AirCargoTons']
		}
		ins = rc.hmset(pattern, ins_data)
	return dumps(data)

@app.route('/departure', methods=['GET'])
def getDeparture():
	print('Getting data from redis... (Departure)')
	pattern = 'Departure:*'
	keys = rc.keys(pattern)
	res = []
	for key in keys:
		val = rc.hgetall(key)
		res.append(val)
	response = app.response_class(response=dumps(res), status=200, mimetype='application/json')
	return response

@app.route('/storeDeparture', methods=['POST'])
def storeDeparture():
	print('Caching redis... (Departure)')
	data = request.get_json()[0]
	data = loads(data)
	for item in data:
		pattern = 'Departure:'+str(item['id'])
		ins_data = {
			'id' : item['id'],
			'DataExtractDate' : item['DataExtractDate'],
			'ReportPeriod' : item['ReportPeriod'],
			'Arrival_Departure' : item['Arrival_Departure'],
			'Domestic_International' : item['Domestic_International'],
			'CargoType' : item['CargoType'],
			'AirCargoTons' : item['AirCargoTons']
		}
		ins = rc.hmset(pattern, ins_data)
	return dumps(data)

@app.route('/flush', methods=['POST'])
def flushCache():
	print('Flush cache...')
	rc.flushdb()
	return dumps(True)

if __name__ == '__main__':
    app.run(debug=True)

