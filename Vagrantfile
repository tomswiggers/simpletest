Vagrant::Config.run do |config|
  #config.vm.box = "drupal-base"
  config.vm.box = "basebox"
  config.vm.network :hostonly, "33.33.33.12"
  config.vm.provision :shell, :path => "init.sh"

  config.vm.provision :puppet do |puppet|
    puppet.manifests_path = "manifests"
    puppet.manifest_file = "php.pp"
  end
end
