import serial
import datetime

ser = serial.Serial('/dev/ttyAMA0', 9600, timeout=1)
ser.open()
count = 0 
try:
      while 1:
        indata = ser.readline()
        current_time = datetime.datetime.now()
	print indata + current_time.strftime("%Y-%m-%d %H:%M:%S")
        print count 
        count = count + 1
        if count > 100:
           count = 0
except KeyboardInterrupt:
      ser.close()
