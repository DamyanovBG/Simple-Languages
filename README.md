# Usage
First of all, you need to load the class and assign it to a variable.
<code>
    include_once('Languages.class.php');
    $language = new Language('en')';
</code>

Now, we can add our strings to an array. For example, lets add <b>hello_world</b> and <b>hi</b> for english.
<code>
    $en = Array(
        'hello_world' => 'Hello World!',
        'hi' => 'Hello',
    );
</code>

Lets add them in bulgarian.
<code>
    $bg = Array(
        'hello_world' => 'Здравей свят!',
        'hi' => 'Здрасти',
    );
</code>

After that, we have to create them with the <b>add()</b> function, given by the class.
<code>
    try{
        $language->add($en, 'en');
        $language->add($bg. 'bg');
    }catch(Exception $e){
        echo $e->getMessage();
    }
</code>
If there is an error, we <b>echo</b> the message,

All strings we've added, can be show like this.
<code>
    echo HELLO_WORLD;
</code>
<b>Note the uppercase!</b>

Try adding <b>?lang=en</b> to your url and see what will popup.

# First Version
Remember that this is the first version and this could be done easier.
