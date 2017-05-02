-- <one line to give the program's name and a brief idea of what it does.>
-- Copyright (C) <year>  <name of author>
--
-- This program is free software: you can redistribute it and/or modify
-- it under the terms of the GNU General Public License as published by
-- the Free Software Foundation, either version 3 of the License, or
-- (at your option) any later version.
--
-- This program is distributed in the hope that it will be useful,
-- but WITHOUT ANY WARRANTY; without even the implied warranty of
-- MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
-- GNU General Public License for more details.
--
-- You should have received a copy of the GNU General Public License
-- along with this program.  If not, see <http://www.gnu.org/licenses/>.

DROP TABLE llx_inscrits ;


CREATE TABLE llx_inscrits(
   rowid INTEGER AUTO_INCREMENT PRIMARY KEY,
   entity INTEGER DEFAULT 1 NOT NULL,
   fk_othertable INTEGER NOT NULL,
   nom VARCHAR(64) NOT NULL,
   prenom VARCHAR(64) NOT NULL,
   mail VARCHAR(128) NOT NULL,
   sexe VARCHAR(10) NOT NULL,
   entreprise boolean NOT NULL,
   pass text NOT NULL

);
