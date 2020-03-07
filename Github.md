# Github

## Version control

Please commit changes to the "dev" branch for testing and screwing up only.
We **must** ensure dev is stable before sending it to master branch to prevent complete loss of code and other problems.

## Setting up Github

1. Generate ssh keys `ssh-keygen -t rsa -D 4096 -C "[email account]"`
2. Add **public** ssh key to Github account
3. Install Github
4. Add Github credentials to local machine
5. Setup github on local machine

## Git Hub Commands

We will manually update the master branch, so all commands will apply to the "dev" branch

<br>

### Config Github global credentials on local machine

- `git config --global user.name` "[github username]"
- `git config --global user.email` "[github email]"
 
### Setup Github on local machine
 
- `git clone [URL]` //copies all the files over without needing authorization
- `git pull origin dev` //Enter this command AFTER
- `git clone` to retrieve and synchronize changes


### Commiting Changes Process


1. `git add [file name]` // Add the **specified** file to a basket before commiting
2. ` git add .` // Adds all the files in your current directory to the basket
3. `git commit -m "[message]"` //commit changes to local git repository (not github)
4. `git push --set-upstream` //
5. `git push origin dev` //pushes the basket full of changes to this github repository. (Note: You must pull all changes before being able to push anything)

### Retrieving Changes

- `git pull origin dev` //enter this command in the root folder

### Following Changes
 
- `git log` // lists version history for the current branch.
- `git commit` messages are displayed clearly here


### Branch Management

- `git status` //shows which branch you are on and tracks `git add`
- `git branch` //shows which branch you are on
- `git checkout [branch name]` //changes and updates your working directory to that branch