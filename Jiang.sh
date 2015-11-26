echo "My Student ID is 103213014, and my IP is ">> /home/test/what.txt
ifconfig |grep inet |awk 'NR==3 {print $2}' >> /home/test/what.txt

