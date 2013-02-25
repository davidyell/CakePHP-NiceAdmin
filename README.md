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
###Boolean Helper
This will change boolean display fields into ticks (&#10004;) and crosses (&#10008;) rather than 1/0.

##Get the code
###Composer & Packigist
The plugin also has [Composer](http://getcomposer.org/) support.  
Packigist entry: [https://packagist.org/packages/davidyell/nice-admin](https://packagist.org/packages/davidyell/nice-admin).

###Submodule
You can add the plugin as a submodule to your project.  
`git add submodule https://github.com/davidyell/CakePHP-NiceAdmin.git app/Plugin/NiceAdmin`  

###Clone
You can create your own copy of the repo.  
`git clone https://github.com/davidyell/CakePHP-NiceAdmin.git app/Plugin/NiceAdmin`  

###Download as a zip
Simply hit at the top of the page and extract the archive into `app/Plugin/NiceAdmin`  

##Installation
The plugin will need to be loaded using `CakePlugin::load('NiceAdmin')` in your `app/Config/bootstrap.php`.  
If you are already using `CakePlugin::loadAll()` you need not worry about adding a line to load it specifically.  
[More on loading plugins in the CakePHP book](http://book.cakephp.org/2.0/en/plugins.html)

##Usage
To use the helpers you will need to add them to your helpers array in your controller. As I tend to use my helpers everywhere, I usually use the `app/Controller/AppController.php`.  

------
###Loading StatusLights Helper
You can pass in an array of options into the StatusLights helper. The key of the array is the `status_id` then an array of the `label` to display and the `class` of the item output.  
```php
public $helpers = array(
    'NiceAdmin.StatusLights'=>array(
        1 => array(
            'label'=>'Live',
            'class'=>'label label-success'
        ),
        2 => array(
            'label'=>'Inactive',
            'class'=>'label label-inverse'
        ),
        3 => array(
            'label'=>'Deleted',
            'class'=>'label'
        )
    ),
);
```  
The example here replicates the default settings in the helper. So if you are happy with the defaults, you don't need to pass these options in.  

###StatusLights Helper
This will convert a status link into a nice visually identifiable label.   

```
<td>
	<?php echo $this->StatusLights->status($var['Foo']['id']) ?>
</td>
```
-----

### Loading ActionButtons Helper
```php
public $helpers = array(
	'NiceAdmin.Actions'
);
```  
Once the helpers are loaded you can use them to make your admin index pages look nice and spangly.  

###ActionButtons Helper
You can output either buttons or icons depending on which you need. The helper will, by default, output all three links as buttons.  
Passing in an array of buttons you want to ouput as `v`,`e` and/or `d`. For 'View', 'Edit', and 'Delete'. The last option is either `icons` or `buttons`.  
```
<td class="actions">
	<?php echo $this->Actions->actions($var['Foo']['id'], array('e','d'), 'icons');?>
</td>
```  

-----

### Loading Boolean Helper
Similar to the StatusLights helper you can pass in an array of options to customise the display of the output.  
```php
public $helpers = array(
    'NiceAdmin.Boolean'=>array(
        1 => array( // true
            'class'=>'badge badge-success',
            'display'=>'&#10004;'
        ),
        0 => array( // false
            'class'=>'badge badge-important',
            'display'=>'&#10008;'
        )
    )
)
```  
### Boolean Helper
```
<?php echo $this->Boolean->display(1); ?>
```

-----

##What's it look like?
![Table row](http://i.imgur.com/xZSy8.png)

##Further development
Let me know what features you'd like or feel free to fork and create a pull request.  

* Update to plugins for CakePHP v2.3 - which introduces settings merging.

##License
<a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.
