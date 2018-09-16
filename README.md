# accounting

Git Commands

#Add files
Git add . —all

#commit changes
Git commit -m “Notes”

#push changes upstream
Git push origin head

#pull down changes
Git pull origin branch_name

#checkout a different branch
Git checkout branch_name

#create and checkout new branch
Git checkout -b branch_name


Typical workflow

Git checkout staging
Git pull
Git checkout -b new_branch_name
*after changes*
Git add . —all
Git commit -am “Notes”
Git push origin head

**create pull request on GitHub**
