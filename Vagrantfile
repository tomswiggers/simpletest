Vagrant::Config.run do |config|
  config.vm.box = "drupal-base"
  config.vm.network :hostonly, "33.33.33.12"
  config.vm.provision :shell, :path => "init.sh"
end

