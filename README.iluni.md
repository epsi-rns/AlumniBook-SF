AlumniBook on Symfony for ILUNI
===============================

This is a rewrite of legacy AlumniBook project.
And I might to make other ports as well for learning purpose.

## Goal

Get rid of legacy version.


Feature Not Implemented
-----------------------

Below is few things from legacy version that 
I've decided not to implement in this learning purpose version.

*	ViewContact Transpose:
	Depend on specific stored procedure (from firebird database).
*	Cross Tabulation Community: 
	Depend on specific raw query (from any database).

Both lead to lost of doctrine portability.


LibreOffice Export
------------------

The [PEAR OpenDocument](http://pear.php.net/package/OpenDocument/) libraries
is still in alpha stage.
It is still far behind my version of
Delphi office suite exporter,
it utilize multithreaded class that communicate with COM.
Maybe someday i'll rewrite legacy delphi code in Lazarus.


Related Document
-------------------------
For those developer one to use this work.
You can find related documents in
[my legacy work](https://github.com/epsi/AlumniBook-CI).

*	Database Schema (as JPEG images).
*	Questionnaire (Word Document).
*	Original Firebird Sample (Legacy),
	not used anymore in this project.
	
History (Coding)
----------------

The original legacy version is:

*	https://github.com/epsi/AlumniBook-CI (CodeIgniter)
*	https://github.com/epsi/AlumniBook-D7 (Delphi)

And the original php-code before rewrite to 
Code Igniter is... __simply garbage__,
so I decide not to upload it at all.

The goal for first commit is exploring possibility
to port every legacy feature,
so we can get rid of both legacy versions.

I've made the original works for non profit organization.
But the code and schema belong to myself.
So anybody have freedom to port to other framework.

Now time has changed.
We have a rewrite, so anybody may use it freely.


History (Project)
----------------
The original legacy AlumniBook Project was a part of 
Buku Alumni Project ILUNI-FTUI.

*	Starting from Questionnaire,
*	Process 'em with information system
	using PHP as front end and Delphi for data entry
*	And our final product is a book,
	basically a printed version of this database

The book project is initiated by Aswil Nazir,
The questionnaire made by Zaenal Fanani,
Data collecting worked by Ade Tauhid.

I only contribute a small part,
it is the information system,
that is also intended as open source.

Now, as a rewrite, this new project (AlumniBook on Symfony),
is no longer related to any legacy project,
nor any foundation using the legacy project.

As I published this rewrite, it belong to public domain.
In fact, I am also giving it back to the alumni foundation.	


License
-------

MIT License.
