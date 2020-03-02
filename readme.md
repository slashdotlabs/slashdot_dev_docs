# Slash Dot Labs Docs and Blog

![Build & Publish](https://github.com/slashdotlabs/slashdot_dev_docs/workflows/Build%20&%20Publish/badge.svg?branch=master&event=push)

This project contains an internal blog where developers document processes and learnings from 
various projects.

The main intent however, is to have a central place for documentation of the products 
we develop for client. It can also be used for internal tools.

> This feature is yet to be integrated

## Built with

The site is built using [Jigsaw](https://jigsaw.tighten.co) which uses Laravel's blade 
templating engine. The blog uses a starter template provided with 
[TailwindCSS](https://tailwindcss.com) styling. Check out the blog template [here](https://github.com/tightenco/jigsaw-blog-template).
The docs section of the site is also to utilise a similar template as well. 
Check out the docs templete [here](https://github.com/tightenco/jigsaw-docs-template).

## Usage

__Adding a new post__

All the site source files are in the `source` directory and all blog posts 
are in the `_posts` directory. To add a new post, simply create a new 
markdown file and go to town on the content.

> Here is a markdown cheatsheet you can use: [Cheatsheet](https://guides.github.com/pdfs/markdown-cheatsheet-online.pdf)

__Post metadata__

Jigsaw uses yaml syntax at the begin of the files to set-up some metadata.
The various fields are:

Layout specific
- _extends_ : The partial layout file to use. Blog posts __MUST__ extend `_layouts.post`
- _section_ : The section to place the content in the content. Blog posts __MUST__ use `content` as the section

Blog post specific
- _title_ 
- _description_
- _author_ 
- _author_link_ (OPTIONAL) Creates an anchor tag on the author's name. *Shameless self plug lol :)*
- _date_: Publish date
- _categories_: an array of categories to place the post under

You can checkout existing posts to get a feel of what the file should have.

__Publishing the post__

There is a workflow setup that runs on push to master and runs the build process to 
publish the site. All you have to worry about is committing your post to the repo.

__Using the project locally__

You can checkout the [Jigsaw Docs](https://jigsaw.tighten.co/docs/installation/) for more information and features.

### Example markdown post file
```markdown
---
title: Publish Release PHP Console App
description: A create release automation tool for our wordpress plugin development
extends: _layouts.post
section: content
author: Name
author_link: https://shameless-self.plug/link
date: 2020-02-25
categories: [tooling]
---

## Example heading 2

Sample content.

```

## Future Features:
- [ ] Archiving posts after a certain date threshhold
- [ ] Allowing posts to be published at a future date.