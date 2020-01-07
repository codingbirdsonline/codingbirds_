# Drop down list with country flags
How to make searchable dropdown with country flag

[Click here to see the result](https://codingbirdsonline.com/demo/how-to-make-searchable-select-dropdown/)

I have set the table name as country. Feel free to change the table name as per your project needs.
Flag images are inside the flag directory.

### Relation between the flag image filename and code in the country table

The code column in the country table holds the code for the country in Uppercase. And the flag image filename is equal to the code but in lowercase. So, you can fetch the code value from the table and then change it to lowercase and concatenate .png along with the path to the flags directory to get the image link.

If you are going to use this in your web project then put the flags directory inside the image directory of your project.

