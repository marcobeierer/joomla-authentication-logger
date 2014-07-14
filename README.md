# Joomla Authentication Logger
An authentication logger plugin for Joomla 2.5 and 3, which logs all important authentication events.

## Logged Events
- User login
- User login failure
- User logout
- User logout failure
- Password change (not yet implemented)
- Forget password (not yet implemented)
- Forgot username (not yet implemented)

## Which data is logged?
- Time
- Severity
- Action
- Username
- Details
- User IP

## Features
- Log rotation: The plugin creates a new logfile every day.

## Planned Features
- Daily report of warnings via email.

## Installation
Just install the provided plugin package and activate it in the Plug-in Manager. The log files are created in your Joomla log directory.
