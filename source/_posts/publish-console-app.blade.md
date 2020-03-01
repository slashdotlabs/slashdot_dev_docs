---
title: Publish Release PHP Console App
description: A create release automation tool for our wordpress plugin development
extends: _layouts.post
section: content
author: Stephen Wanyee
author_link: https://github.com/steekam
date: 2020-02-25
categories: [tooling]
---

### First, some context

We use Github as our git versioning platform, so it made sense to use the repo releases feature to provide 
versioning for plugins. So to create a release you have to create a tag then create an archive based off that tag. It's basically 
like a savepoint for your code. 

Sounds easy enough right? However, we had to hook into the Wordpress API in our plugins to check for updates 
in our respective repositories. Our solution was to have an `info.json` file on the master branch that would have have all the relevant 
up-to-date information required for a plugin update notification.

In that case, the whole _release_ process includes updating the version number in the main plugin file and also updating 
this `info.json` file. Most of the times I used to forget to bump the version in the plugin file or write the wrong 
download url in the `info.json`. So we decided we should automate this using some sort of script.

### The tool

From working with Gulp, a Javascript task runner, the first idea that came to mind was to write a task for this whole process. 
Though eventually, I ended up considering running a PHP script in the CLI running all the required tasks:

    - Bump the version in the plugin file
    - Create a tag with the new version
    - Push to the remote repo
    - Using the Github Api, create a release
    - Update `info.json` with the new download link
    - Push modified `info.json` to master

For a whole week I went into a rabbit hole of how to run CLI processes from a PHP script and displaying the output in a decent way. 
I eventually landed on a Symfony Console Component. This made it even more easier and fun to create the mini dev tool.

> Fun fact: The Laravel command line tools are built from this Symfony Console Component

The tool made creating releases way faster and easier. Combined with standard guidlines like [Semantic Versioning](https://semver.org) 
the console application proved to be quite a valuable tool.

### Caveats

We use _composer_ to manage the dependencies in our plugins. A good optimization strategy before shipping a composer project, is to 
generate the vendor folder without dev dependencies. The console app itself is run by dev dependencies, so 
running `composer install --no-dev`, would remove the app's dependencies leading it to fail.

So now we have to refactor the tool itself into another platform/language to allow composer optimization. We don't want to ship a bunch of 
files we never utilise in the plugins. Though the ideal way of doing this versioning and optimization is to use a CI/CD pipelining tool like 
Github actions. That's the next step for this tool.

### Source Code

The tool is still pretty awesome, so I might consider extracting it into a package that also creates releases for non-wordpress projects. 
You can still check out the source code in any of our current plugins on Github under `console_app` directory.