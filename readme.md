# "Globally Paid" Wordpress Custom Theme
A barebones theme setup as child theme of Wordpress Default Twenty Twenty One


### Requirements:
To have editable sections and fields the following plugins must be installed and activated
- Classic Editor
- Advanced Custom Fields Pro

To have the basic contact form running
- Contact Form 7

To compile /scss/main.scss you need to have the following installed in your command line
- [Node.js v14+](https://nodejs.org/en/) 
- [Sass v3+](https://sass-lang.com/install) 

### Usage:

To install sass through Nodes.js's npm

```sh
npm install -g sass
```

To compile:

```sh
sass scss/style.scss:style.css
```

To watch for changes and auto compile:

```sh
sass --watch scss/style.scss:style.css
```
