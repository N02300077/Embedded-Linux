#!/ussr/bin/python
# -*- coding: utf-8 -*-

import serial
import datetime
import sqlite3 as lite
import sys
import time

ser = serial.Serial('/dev/ttyAMA0', 9600, timeout=1)
ser.open()

count = 0 

con = lite.connect('realtime_data.db')

try:
      while 1:
        indata = ser.readline()
        current_time = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
        count = count + 1

	print indata + current_time
        print count 
   
        with con:
          cur = con.cursor()
          cur.execute("INSERT INTO Temperatures VALUES( ?, ?, ? )", (count, current_time, indata))
          if count > 100:
            cur.execute("DELETE FROM Temperatures")
            count = 0
   
       # time.sleep(3) #upload to database every 5 seconds

except KeyboardInterrupt:
      ser.close()
