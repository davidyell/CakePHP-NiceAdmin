# CakePHP-NiceAdmin

This plugin is designed to make admin areas baked from [CakePHP](http://www.cakephp.org/) look a little nicer and be easier to use and understand.  

## Requirements
* CakePHP 3.x
* PHP 5.4.16+
* TwitterBootstrap (optional - just for styling)

## What do you get in the box?  
### ActionButtons Helper
Helper for replacing the 'Actions' cell contents in index views with buttons rather than textual links. 
### StatusLights Helper
Helper for replacing a Status column in an index view with a nice coloured label based on the status_id.  
### Boolean Helper
This will change boolean display fields into ticks (&#10004;) and crosses (&#10008;) rather than 1/0.

## Get the code 
`composer require davidyell/nice-admin:dev-master`  

## Installation
The plugin will need to be loaded using `Plugin::load('NiceAdmin')` in your `/config/bootstrap.php`.  

## Usage
To use the helpers you will need to add them to your helpers array in your `AppView`.

```php
$this->loadHelper('NiceAdmin.StatusLights', $options);
$this->loadHelper('NiceAdmin.Actions');
$this->loadHelper('NiceAdmin.Gravatar');
$this->loadHelper('NiceAdmin.Boolean');
```

------
### Loading StatusLights Helper
You can pass in an array of options into the StatusLights helper. The key of the array is the `status_id` then an 
array of the `label` to display and the `class` of the item output.  

```php
$options = [
    1 => [
        'label'=>'Live',
        'class'=>'label label-success'
    ],
    2 => [
        'label'=>'Inactive',
        'class'=>'label label-inverse'
    ],
    3 => [
        'label'=>'Deleted',
        'class'=>'label'
    ]
);
```  
The example here replicates the default settings in the helper. So if you are happy with the defaults, you don't need 
to pass these options in.  

### StatusLights Helper
This will convert a status link into a nice visually identifiable label.   

```
<td>
	<?= $this->StatusLights->status($entity->id); ?>
</td>
```
-----

### ActionButtons Helper
You can output either buttons or icons depending on which you need. The helper will, by default, output all three links 
as buttons. Passing in an array of buttons you want to ouput as `v`,`e` and/or `d`. For 'View', 'Edit', and 'Delete'. 
Then you'll need to pass in the controller. The last option is either `icons` or `buttons`.
  
```
<td class="actions">
	<?php echo $this->Actions->actions($entity->id, ['e','d'], 'myController', 'icons');?>
</td>
```  

-----

### Loading Boolean Helper
Similar to the StatusLights helper you can pass in an array of options to customise the display of the output.  
```php
$optons = 
    1 => [ // true
        'class'=>'badge badge-success',
        'display'=>'&#10004;'
    ],
    0 => [ // false
        'class'=>'badge badge-important',
        'display'=>'&#10008;'
    ]
)
```  

### Boolean Helper
```
<?= $this->Boolean->display(1); ?>
```

-----

## What's it look like?
![Table row](http://i.imgur.com/xZSy8.png)

## Further development
Let me know what features you'd like or feel free to fork and create a pull request.  

## License
<a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/88x31.png" /></a><br />This work is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.
