# Craft Plugin Generator

![The promise.](http://files.workingconcept.com/raw/BrFMJQRCMAIhEHk-egA20aW49b.png)

A simple web app for generating base Craft plugin packages. Choose the bits and pieces you'll need and generate a ZIP file that'll get you started.

Inspired by [pkg.io](http://pkg.io/).

## Orientation

A single page `public/index.php` takes settings from a form submission and `app/Generator.php` reads `templates/plugin`, replaces placeholders, and (at some point) selectively packages the result into a neat ZIP file.

The current build starts with [Lindsey DiLoreto's Business Logic template](https://github.com/lindseydiloreto/craft-businesslogic) and has been slightly modified with some placeholders (`_basename_`, `_version_`, `_developer_`, `_url_`).

The form's "Include" settings don't currently do anything at all, and the markup is even on the sketchy side. But you get the idea.

## To Do

This is a work in progress, so there's plenty left to do:

- add proper validation
- devise a clever way to add/remove code comments on the fly
- add additional classes to `templates`
- finish adding "Include" options
- support the various "Include" options
- flesh out the plugin README.md
- link to official plugin documentation and other helpful resources
- clean up front end
- consider checking the plugin name against [the list at Straight Up Craft](http://straightupcraft.com/craft-plugins) to identify conflicts