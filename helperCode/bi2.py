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

start_date = sorted(date)[0].strftime('%Y-%m-%d')

f = open(date[pos].strftime('%Y-%m-%d')+'.txt','w+')

gantt = rest[pos].split('\n')[0].split(',')
m = []
c = []
for item in gantt:
	m.append(clean_data[int(item)]['MEETING_TIME'].item())
	c.append(clean_data[int(item)]['COURSE_ID'].item())

temp =[]
for i in range(len(c)):
	if c[i] not in temp:
		f.write(c[i])
		f.write('\t')
		f.write(date[pos].strftime('%Y-%m-%d')+' ' +m[i])
		f.write('\n')
	temp.append(c[i])

f.close()

