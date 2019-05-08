# magento2-video-slider

Using this module you can create video slider over the home page.

To install the module follow the steps: 

1. Create folder "vendor/module" i.e Techeniac/VideoSlider in app/code directory.

2. enable module :

   go to root directory open terimial and execute the command.
```
   php bin/magento module:enable Techeniac_VideoSlider
```
3. upgrade database :
```
   php bin/magento setup:upgrade

   php bin/magento setup:static-content:deploy -f (if you are in developer mode)
```
module has been installed now check in the admin for module.

Admin -> video slider -> video slider (add video slider from youtube/system)
Admin -> video slider -> configuration (To enable the video slider and enable/disable video sound )

After adding the video in the grid you will find the slider on the home page as follows : 

![screencapture-m225-test-2019-05-08-16_27_27](https://user-images.githubusercontent.com/14865794/57370768-86b88a80-71ae-11e9-9bba-822f0f44cba6.png)

