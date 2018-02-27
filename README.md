# coderzwar
online-judge

CoderzWar is an Online Judge. It can judge codes of C, C++, Java, Python 2.x and Python 3.x Languages. It has special judge feature besodes of i/o matching. It is the 4th Online Judge of Bangladesh. It runs on any linux distribution. But it have to be on linux because I've used bash as my judging part scripting which runs natively in linux[recently windows has adopted bash and it's native apps, but as I've not tested it, I can't gurantee if it will run their or not]. You will require some compiler packages for the languages. Here are they:
1. For C : `gcc`
2. For C++ : `g++`
3. For Java: `default-jdk`
4. For Python 2: `python`
5. For Python 3: `python3`

## To install this script:
1. Go to application/config/database.php and give your database credentials.
2. if you do not wish to keep your "application" and "system" folders in public directory, move it to somewhere else and set their full path to "index.php" file.
3. set permission 0777 for application/cache/Twig folder
4. now run this script on your server. You will see an installation wizard.Give the credentials.
5. Now you've installed the script.
6. go to setting and set your tester[where the judging files exist] and assignments[where the testcast for problems and their descriptions exist] properly.
7. For security reasons, I recommend to build easysanbox shield. Process is decribed below

## To add a contest:
1. go to "assignment" and add an assignment with your favourable setting, and problems, set their time and memory limits. use the default setting for "diff_cmd" and "diff_arg".
2. you will be required to upload a zip file containign test data.

Here is the zip file structure:
```
 p1
 |____ in
       |____ input1.txt
       |____ input2.txt
       
 |____ out
       |____ output 1.txt
       |____ output2.txt
 
 p2
 |____ [same as previous]
 
 p3
 |____ [same as pervious]
 ```
 3. after making folders in such structure, compress them in zip format and upload
 4. You may upload PDF containing problemset for the contest
 
# Sandbox

coderzwar runs lots of user-submitted arbitrary codes. It should run codes in a restricted environment. So we need tools to sandbox submitted codes in coderzwar.

You can improve security by enabling shield alongside Sandbox.


## C/C++ Sabdboxing

coderzwar uses [EasySandbox](https://github.com/daveho/EasySandbox) for sandboxing C/C++ codes. EasySandbox limits the running code using **[seccomp](http://lwn.net/Articles/332974/)**, a sandboxing mechanism in Linux kernel.

By default, EasySandbox is disabled in coderzwar. You can enable it from `Settings` page. But you must "build EasySandbox" before enabling it.

### Build EasySandbox

EasySandbox files are located in `tester/easysandbox`. For building EasySandbox run:

```bash
$ cd tester/easysandbox
$ chmod +x runalltests.sh
$ chmod +x runtest.sh
$ make runtests
```

If it printed the message `All tests passed!`, EasySandbox is built successfully and can be enabled on your system. You can enable EasySandbox in `Settings` page.


## Java Sandboxing

Java sandbox is enabled by default using Java Security Manager. You can enable/disable it in `Settings` page.

# Cheat Detection

coderzwar uses **[Moss](http://theory.stanford.edu/~aiken/moss)** to detect similar codes. Moss (for a Measure Of Software Similarity) is an automatic system for determining the similarity of programs. To date, the main application of Moss has been in detecting plagiarism in programming classes.

You can send **Final** submitted codes (those selected by students as "Final Submission") to Moss server with one click.

Before using Moss, you must get a **Moss user id** and set your Moss user id in coderzwar. Read [this page](http://theory.stanford.edu/~aiken/moss) and register for Moss. You will receive a mail containing a perl script. Your user id is in that script.

This is a part of this perl script containing user id:

```perl

...

$server = 'moss.stanford.edu';
$port = '7690';
$noreq = "Request not sent.";
$usage = "usage: moss [-x] [-l language] [-d] [-b basefile1] ... [-b basefilen] [-m #] [-c \"string\"] file1 file2 file3 ...";

#
# The userid is used to authenticate your queries to the server; don't change it!
#
$userid=YOUR_MOSS_USER_ID;

#
# Process the command line options.  This is done in a non-standard
# way to allow multiple -b's.
#
$opt_l = "c";   # default language is c
$opt_m = 10;
$opt_d = 0;

...

```

Find your user id and use it in coderzwar for cheat detection. You don't need to put your user id in any file. Just save your user id in coderzwar's Moss page and coderzwar will use your user id in Moss perl script.

Your server must have `perl` installed to use Moss.

It is recommended to detect similar codes after assignment finishes. Because coderzwar just sends **Final** submissions to Moss and students can change their **Final** submissions before assignment finishes.



### There are some other features, but I think those are not necessary. Hopefully you'll find them
