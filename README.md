"# magento2-video-slider"

Using this module you can create video slider over the home page.

To install the module follow the steps: 

1. Create folder "vendor/module" i.e Techeniac/VideoSlider in app/code directory.

2. enable module :

   go to root directory open terimial and execute the command.
   php bin/magento module:enable Techeniac_VideoSlider

3. upgrade database :

   php bin/magento setup:upgrade
   php bin/magento setup:static-content:deploy -f (if you are in developer mode)

You module has been installed now check in the admin for module.