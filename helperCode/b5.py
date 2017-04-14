
code_dict = {
    'CMCI':1,
    'ARPL':2,
    'JOUR':3,
    'ARSC':4,
    'MUSC':5,
    'CEPS':6,
    'CRSS':7,
    'CONC':8,
    'BUSN':9,
    'ENGR':10,
    'EDUC':11,
    'LAWS': 12
}

import json
data = {}
data['nodes'] = []
data['links'] = []
# data['key'] = 'value'
# json_data = json.dumps(data)
import pandas as pd

rf = pd.read_csv('rooms-info.csv')

for i in range(100):
	temp = {}
	temp['id'] = rf.iloc[i]['BUILDING_NAME']
	temp['group'] = code_dict[rf.iloc[i]['ACADEMIC_GROUP_CODE']]
	data['nodes'].append(temp)


for i in range(100):
	node = data['nodes'][i]
	for j in range(i,100):
		if node['group'] == data['nodes'][j]['group']:
			temp = {}
			temp['source'] = node['id']
			temp['target'] = data['nodes'][j]['id']
			temp['value'] = 1
			data['links'].append(temp)
			temp1 = {}
			temp1['source'] = data['nodes'][j]['id']
			temp1['target'] = node['id']
			temp1['value'] = 1
			data['links'].append(temp1)


with open('miser-min.json','w') as f:
	json.dump(data, f)

