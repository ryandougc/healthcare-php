# Healthcare-php

## Github 

### Version control

Please commit changes to the "dev" branch for testing and screwing up only.
We **must** ensure dev is stable before sending it to master branch to prevent complete loss of code and other problems.

### Setting up Github

1. Generate ssh keys `ssh-keygen -t rsa -D 4096 -C "[email account]"`
2. Add **public** ssh key to Github account
3. Install Github
4. Add Github credentials to local machine 
5. Setup github on local machine 


### Git Hub Commands

#### Config Github global credentials on local machine

`git config --global user.name` "[github username]" 
`git config --global user.email` "[github email]" 
 

#### Setup Github on local machine
 
`git clone [URL]` //copies all the files over without needing authorization
`git pull origin master` //Enter this command AFTER `git clone` to retrieve and synchronize changes


#### Commiting Changes Process


1. `git add .` //Stage your changes to be commited into local version control
2. `git commit -m "[message]"` //commit changes to local git repository (not github)
3. `git push origin [branch]` //pushes changes to this github repository. You must pull all changes before being able to push anything. 


#### Retrieving Changes 

`git pull` //enter this command in the root folder 

#### Following Changes 
 
`git log` // lists version history for the current branch. `git commit` messages are displayed clearly here


#### Branch Management 

`git branch` //shows which branch you are on
`git checkout [branch name]` //change your directory to that branch.
 
