sudo bash -c \\"echo '192.168.33.21 db-manager' >> /etc/hosts\\"
sudo bash -c \\"echo '192.168.33.22 db-node1' >> /etc/hosts\\"
sudo bash -c \\"echo '192.168.33.23 db-node2' >> /etc/hosts\\"

sudo cp '/vagrant/sources.list' '/etc/apt/apt/sources.list'

sudo apt-key adv --keyserver hkp://keyserver.ubuntu.com:80 --recv 2930ADAE8CAF5059EE73BB4B58712A2291FA4AD5
sudo bash -c \\"echo 'deb [ arch=amd64,arm64 ] https://repo.mongodb.org/apt/ubuntu xenial/mongodb-org/3.6 multiverse' | sudo tee /etc/apt/sources.list.d/mongodb-org-3.6.list\\"

sudo apt-get update
sudo apt-get install -y mongodb-org
sudo systemctl enable mongod
sudo systemctl start mongod

sudo cp '/vagrant/provision/db_node2.conf' '/etc/mongod.conf'
sudo systemctl restart mongod
