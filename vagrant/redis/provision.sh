# Dependency
sudo apt-get -y update
sudo apt-get install -y make gcc libc6-dev tcl

# Redis
curl -OL http://download.redis.io/redis-stable.tar.gz
tar xvzf redis-stable.tar.gz
cd redis-stable
make
sudo make install

# Ruby Built in
sudo apt-get update
sudo apt-get install -y ruby
sudo apt-get install -y gem
sudo gem install redis

# firewall config (optional)
# sudo iptables -N REDIS
# sudo iptables -A REDIS -s 192.168.33.31 -j ACCEPT
# sudo iptables -A REDIS -s 192.168.33.32 -j ACCEPT
# sudo iptables -A REDIS -s 192.168.33.33 -j ACCEPT
# sudo iptables -A REDIS -j LOG --log-prefix "unauth-redis-access"
# sudo iptables -A REDIS -j REJECT --reject-with icmp-port-unreachable
# sudo iptables -I INPUT -p tcp --dport 6379 -j REDIS
# sudo iptables -I INPUT -p tcp --dport 6380 -j REDIS
# sudo iptables -I INPUT -p tcp --dport 6381 -j REDIS
