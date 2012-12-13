#CakePHP-NiceAdmin

This plugin is designed to make admin areas baked from [CakePHP](http://www.cakephp.org/) look a little nicer and be easier to use and understand.  

##Requirements
* CakePHP 2.x
* TwitterBootstrap (optional - just for styling)

##What do you get in the box?  
###ActionButtons Helper
Helper for replacing the 'Actions' cell contents in index views with buttons rather than textual links. 
###StatusLights Helper
Helper for replacing a Status column in an index view with a nice coloured label based on the status_id.  

##Get the code
Code is hosted on [Github.com](http://www.github.com/).

###Download as a zip
![Zip button](http://i.imgur.com/acDZq.png)  
Simply hit at the top of the page and extract the archive into `app/Plugin/NiceAdmin`  

###Submodule
You can add the plugin as a submodule to your project.  
`git add submodule https://github.com/davidyell/CakePHP-NiceAdmin.git app/Plugin/NiceAdmin`  

###Clone
You can create your own copy of the repo.
`git clone https://github.com/davidyell/CakePHP-NiceAdmin.git app/Plugin/NiceAdmin`  

##Installation
The plugin will need to be loaded using `CakePlugin::load('NiceAdmin')` in your `app/Config/bootstrap.php`.  
If you are already using `CakePlugin::loadAll()` you need not worry about adding a line to load it specifically.  
[More on loading plugins in the CakePHP book](http://book.cakephp.org/2.0/en/plugins.html)

##Usage
To use the helpers you will need to add them to your helpers array in your controller. As I tend to use my helpers everywhere, I usually use the `app/Controller/AppController.php`.  

```php
public $helpers = array(
		'NiceAdmin.Actions',
		'NiceAdmin.StatusLights'
		);
```
Once the helpers are loaded you can use them to make your admin index pages look nice and spangly.  

###ActionButtons Helper
Then you can output either buttons or icons depending on which you need.  
`echo $this->Actions->actionButtons($var['Foo']['id']);`  
where `$id` is the id of the item you want buttons for. If you want to use icons call,  
`echo $this->Actions->actionIcons($var['Foo']['id']);`  
The helper will output all three buttons. 'View', 'Edit' and 'Delete'.

````html
<td class="actions">
	<?php echo $this->Actions->actionButtons($var['Foo']['id']);?>
</td>
````

###StatusLights Helper
This will convert a status link into a nice visually identifiable label.   
````html
<td>
	<?php echo $this->StatusLights->status($var['Foo']['id']) ?>
</td>
````

##What's it look like?
![Table row](http://i.imgur.com/2ZrVo.png)

##Further development
###ActionButtons
* Allow *ActionButtons* to generate a configured number of buttons, or to exclude.  

###StatusLights
* Make the ids in *StatusLights* configurable, rather than static.

##License
<a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.