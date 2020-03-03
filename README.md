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
``` 
git config --global user.name "[github username]" 
git config --global user.email "[github email]" 
``` 

#### Setup Github on local machine

``` 
git clone [URL] //copies all the files over without needing authorization
git pull origin master //Enter this command AFTER `git clone` to retrieve and synchronize changes
```

#### Commiting Changes 
```
git commit -m "[message]" //commit changes and pushes to repository
```

#### Branch Management 
```
git branch //shows which branch you are using 
git checkout [branch name] //switches to that branch
``` 
