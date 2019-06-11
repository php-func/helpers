set MESSAGE=Update
::set MESSAGE=%~1
::IF NOT DEFINED %MESSAGE% ( set MESSAGE=Update )
git add .
git commit -a -m %MESSAGE%
git push