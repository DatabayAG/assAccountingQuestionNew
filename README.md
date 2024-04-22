ILIAS Accounting Question plugin
================================

Copyright (c) 2018 Institut fuer Lern-Innovation, Friedrich-Alexander-Universitaet Erlangen-Nuernberg,  GPLv2, see LICENSE 

**Further maintenance is provided by [Databay AG](https://www.databay.de).**

- Author: Fred Neumann <fred.neumann@ili.fau.de>, Jesus Copado <jesus.copado@ili.fau.de>
- Forum: http://www.ilias.de/docu/goto_docu_frm_3474_1944.html
- Bug Reports: http://www.ilias.de/mantis (Choose project "ILIAS plugins" and filter by category "Accounting Question")

Installation
------------
When you download the Plugin as ZIP file from GitHub, please rename the extracted directory to *assAccountingQuestion* (remove the branch suffix, e.g. -master).

1. Copy the assAccountingQuestion directory to your ILIAS installation at the following path 
(create subdirectories, if neccessary):
Customizing/global/plugins/Modules/TestQuestionPool/Questions/
2. Run `composer du` in the main directory of your ILIAS installation
3. Go to Administration > Extending ILIAS > Plugins
4. Choose "Update" for the assAccountingQuestion plugin
5. Choose "Activate" for the assAccountingQuestion>yqw plugin

There is nothing to configure for this plugin.

Usage
-----
This plugin provides a test question type for financial booking tables  (t-accounts and booking records).

See [Anleitung](docs/Anleitung-Deutsch.pdf) or [Manual](docs/Manual-English.pdf) for details.

Version History
===============

Version 1.20.0 (2022-09-20)
--------------------------
* Updated for ILIAS 7.13 new fromXML definition
