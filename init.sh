echo "fix eth1 problems, till I find why this is happening"
sudo rm /etc/udev/rules.d/70-persistent-net.rules
sudo /etc/init.d/networking restart

sudo ln -s /vagrant/test /var/www/test
