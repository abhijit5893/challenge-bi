import math
date = []
count = []
rest = []

with open('2013.txt','r+') as f:
	data = f.readlines()

	i = 0
	pos = 25
	for line in data:
		date.append(line.split('\t')[0])
		count.append(line.split('\t')[1])
		rest.append(line.split('\t')[2])
		i += 1

days_dict = {
	'MWTH' : [1,0,1,1,0,0,0],
	'WF': [0,0,1,0,1,0,0],
	'MF': [1,0,0,0,1,0,0],
	'TH': [0,0,0,1,0,0,0],
	'F': [0,0,0,0,1,0,0],
	'S': [0,0,0,0,0,1,0],
	'MTWF': [1,1,1,0,1,0,0],
	'M': [1,0,0,0,0,0,0],
	'M-TH': [1,1,1,1,0,0,0],
	'SU': [0,0,0,0,0,0,1],
	'MTH': [1,0,0,1,0,0,0],
	'MTTF': [1,1,0,1,0,0,0],
	'MW': [1,0,1,0,0,0,0],
	'TTH': [1,0,1,0,0,0,0],
	'TTHF': [0,1,0,1,1,0,0],
	'MWF': [1,0,1,0,1,0,0],
	'W': [0,0,1,0,0,0,0],
	'TF': [0,1,0,0,1,0,0],
	'M-F': [1,1,1,1,1,0,0],
	'T': [0,1,0,0,0,0,0],
}


import csv
from datetime import datetime
import pandas as pd

y = 2013
index=['COURSE_ID','CLASS_START_DATE','CLASS_END_DATE','DAYS','MAX_ENROLLMENT',
								'TERM','INSTRUCTOR_NAME','MEETING_TIME']

df = pd.read_csv('course-info.csv')
year = []
date = []
for item in df['CLASS_START_DATE']:
	date.append(datetime.strptime(item, '%Y-%m-%d'))
	year.append(datetime.strptime(item, '%Y-%m-%d').year)

df1 = pd.Series(year,index=df.index)

data = []
for index in range(len(df['CLASS_START_DATE'])):
	if df1[index] == y:
		data.append(df.iloc[[index]])

clean_data = []
for item in data:
	if not(item['DAYS'].item() == '-' or item['DAYS'].item() == 'TBA'):
		clean_data.append(item)

days =[]
for i in clean_data:
	days.append(days_dict[i['DAYS'].item()])

ind = rest[pos].split('\n')[0].split(',')

rf = pd.read_csv('rooms-info.csv')
f = open(date[pos].strftime('%Y-%m-%d')+'_alloc.txt','w+')


m = []
c = []
x = []

with open(date[pos].strftime('%Y-%m-%d')+'.txt','r+') as f1:
	d = f1.readlines()
	for line in d:
		c.append(line.split('\t')[0])
		m.append(line.split('\n')[0].split('\t')[1])

for i in range(len(c)):
	for j in range(len(clean_data)):
		if clean_data[j]['COURSE_ID'].item() == c[i]:
			x.append(j)


for i in range(len(c)):
	alg = []
	capacity = clean_data[x[i]]['MAX_ENROLLMENT'].item()
	for j in range(len(rf)):
		if int(rf.iloc[j]['ROOM_CAPACITY'].item()) - int(capacity) >= 0 and (int(rf.iloc[j]['ROOM_CAPACITY'].item()) - int(capacity)) <= 5:
			alg.append(j);
	mini = rf.iloc[alg[0]]['ROOM_COST'].item()
	mpos = 0
	for k in range(1,len(alg)):
		if rf.iloc[alg[k]]['ROOM_COST'].item() <= mini:
			mini = rf.iloc[alg[k]]['ROOM_COST'].item()
			mpos = alg[k]
	rol = []
	for k in range(0,len(alg)):
		rol.append(rf.iloc[alg[k]]['ROOM_COST'].item())
	print rol
	# print clean_data[x[i]]['COURSE_ID'].item(),rf.iloc[mpos]['BUILDING_NAME'],rf.iloc[mpos]['ROOM_NUMBER'],clean_data[x[i]]['MAX_ENROLLMENT'].item(),rf.iloc[mpos]['ROOM_CAPACITY'],rf.iloc[mpos]['ROOM_COST']
	# f.write(clean_data[x[i]]['COURSE_ID'].item())
	# f.write('\t')
	# f.write(rf.iloc[mpos]['BUILDING_NAME'])
	# f.write('\t')
	# f.write(rf.iloc[mpos]['ROOM_NUMBER'])
	# f.write('\t')
	# f.write(str(clean_data[x[i]]['MAX_ENROLLMENT'].item()))
	# f.write('\t')
	# f.write(str(rf.iloc[mpos]['ROOM_CAPACITY'].item()))
	# f.write('\t')
	# f.write(str(rf.iloc[mpos]['ROOM_COST']))
	# f.write('\n')
	rf.drop(df.index[mpos])
f.close()