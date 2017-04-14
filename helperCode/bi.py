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

from datetime import timedelta,date,datetime
f = open('2013.txt','w+')
result = {}
start = datetime.strptime(start_date, '%Y-%m-%d')
end = datetime(y, 12, 31)
next_date = start
while (next_date - end).days <= 0:
    course_id = []
    count  = 0
    for index in range(len(clean_data)):
        temp_start = datetime.strptime(clean_data[index]['CLASS_START_DATE'].item(), '%Y-%m-%d')
        temp_end = datetime.strptime(clean_data[index]['CLASS_END_DATE'].item(), '%Y-%m-%d')
        if result.get(next_date.strftime('%Y-%m-%d'),None) is None:
                result[next_date.strftime('%Y-%m-%d')] = 0
        wday = days[index][next_date.weekday()]
        if wday == 1:
            if (next_date - temp_start).days >= 0 and (temp_end - next_date ).days >= 0:
                result[next_date.strftime('%Y-%m-%d')] += 1
                course_id.append(index)
                count += 1

    f.write(next_date.strftime('%Y-%m-%d'))
    f.write('\t')
    f.write(str(count))
    f.write('\t')
    f.write(','.join(str(x) for x in course_id))
    f.write('\n')
    print next_date, count
    next_date += timedelta(days=1)
f.close()





