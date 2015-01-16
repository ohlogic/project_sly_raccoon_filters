import sys

def output(data):

	print data + ' by python code'

if __name__ == "__main__":

	if( not len(sys.argv) >= 2 ):
		print "argument is required"
		sys.exit(1)
	
	s = sys.argv[1].decode("hex")
	
	#perform any post processing on the web page
	#e.g.,
	s = s.upper() # or anything sed can do +
	output(s)
	
	

