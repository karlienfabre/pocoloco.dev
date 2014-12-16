## JS workbench


This JS workbench entirely relies on the GruntJS. So if you haven't used Grunt before, check out the [docs](http://gruntjs.com/getting-started). I tried to develop some kind of a system that is both flexible and performant.


### Installation

At the root of the `resources` folder (which is 1 level above this one), there is a Gruntfile. That gruntfile is the core of this workbench, as it will monitor all changes while you're working and export all required builds.

All dependencies regarding Grunt plugins are set in the `package.json` file. So, assuming you've installed the grunt cli, if you run:

```JS
npm install --save-dev
```

on the root `resources` folder in your terminal/commandline, all `node_modules` will be installed. From here on, we can start using the workbench.

**NOTE:** The `node_modules` don't belong on a repository, so they're gitignored.


### A quick guide through

First, let's guide you through the structure. A clean install comes with the following componenets:
```JS
- /app.js
- /builds
- /imports
- /libs
- /temp
- /vendor
```

#### Main files: app.js
All js files in the root of the JS folder are main files. These are the onces that'll be grunted.

The special thing about these main files is that they can import other js files (which should be placed in `/imports`) in a similar a SASS import works. This functionality is provided by the Jsic grunt plugin (which is one of the dependencies declared in `package.json`).

Imagine you want to place all your JS objects in a separate file (in order to keep your code nice and clean) and you want to import it in your main file:

```JS
/* in /app.js */

$import( "imports/objects.js" );
```

The advantage of this approach in comparison to simply merge files with grunt, is that you can import complete files within an anonymous function. If you merge multiple JS files and want to make sure objects are accessible in the whole document, you'll have to define them globally (outside the scope of an anonymous function). That makes it rather easy to tamper with them using the console in dev tools.


#### Imports
As mentioned above, this folder contains all files that will be imported in main files.


#### Libs
This folder contains all libraries you're using on a project (for example a jQuery fallback in case it's not available on CDN, modernizr, ...).


#### Vendor
The vendor folder contains all 3rd party plugins (like for example jQuery Easing). All files inside this folder will be grunted to 1 file called `plugins.js`.


#### Builds
Last but not least: the builds folder wil contains all grunted files (grunted main files and `plugins.js`).


#### Temp
Don't bother about this one, it simply holds temp files when creating the different builds. It's contents are gitignored so no junk will end up on your repository.


### Using the workbench

The very first thing you should do when you start working on a project using this workbench, is navigate to the `resources` folder and run:

```JS
grunt
```

By default, the grunt command will run the 'watch' task defined in the Gruntfile. Feel free to change this default behaviour and call the watch function by running:

```JS
grunt watch
```

When running either of these commands, Grunt will created several builds whenever:
- a change is made to a main file
- a change is made to one of the imported files
- plugins have been added to the vendor folder 

Go ahead, make a change to one of these files. Now head over to the builds folder. Notice each file has a double, buth with another prefix (min vs mangle). By default, this workbench is exporting 2 builds for each file:

**Development builds (dev)**<br>
Development builds are the ones you should use when working in a development environment (localhost or dev servers). Development build minify the code, but leave comments, variable and function names untouched. They're always prefixed with 'min'.

For example, if you want to load your main file `app.js` in your HTML:

```HTML
<!doctype html>
<html>
<head></head>
<body>
    <script src="/resources/js/builds/min.app.js" type="text/javascript"></script>
</body>
</html>
```

**Distribution builds (dist)**<br>
Distribution builds are ment to use on staging or production servers. The minify the code, mangle (shorten) variable and function names, remove comments and drop console logs. Therefor, they're prefixed with 'mangle'.

So, if you want to load your mangled version of `app.js`:

```HTML
<!doctype html>
<html>
<head></head>
<body>
    <script src="/resources/js/builds/mangle.app.js" type="text/javascript"></script>
</body>
</html>
```


### Adding your own main files
Now, I presume you wont be satisfied using 1 main file only. Adding one is simple: just add it in the root of the `js` folder. To include it in the grunt builds, open the Grunfile (in the root of the resources).

Locate the `jsic` task and add the following line to the `files` property (replace 'your-main-file' by the actual name):
```JS
"js/temp/your-main-file.js" : "js/your-main-file.js",
```

Now, locate the `uglify` task, which should be right below the `jsic` task. Add the following line to the `files` property for the dev build:
'your-main-file' by the actual name):
```JS
"js/builds/mangle.your-main-file.js" : "js/temp/your-main-file.js",
```

That's it! Now restart the grunt watch task and your newly created main file will be included in the builds.