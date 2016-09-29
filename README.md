# FIFA World Cup Database

## Introduction

The goal of this project is to design and implement a database system for the FIFA World Cup. The project has three major portions:

1. Data ETL: Study basic knowledge of FIFA World Cup and design database schema. Base on the research, write scripts to ETL data from public online sources to MySQL Database.

2. SQL queries and Web UI design: Write SQL queries. Create and implement the web-based user interface that can query the database through PHP functions.

3. Data Visualization: Convert data into plots or interactive maps that can help uses better comprehend the information. JavaScript HighChart and Tableau were used in this part.

![main](https://cloud.githubusercontent.com/assets/16885033/18914489/59df5a44-855b-11e6-896f-af1e714b1b4a.gif)

## Function Overview

The project implements 9 queries:

**Cups Query**: This query takes a year and a team as input. It will return the host country, team rankings of the given Cup and game results for the given team.

![q1](https://cloud.githubusercontent.com/assets/16885033/18914491/5d02b658-855b-11e6-837c-3dd29c16a21d.gif)

**Players Query**: This query takes user input and will return the player’s participation in all Cups, the country he played with, goals he scored, birthday and age. For example, by entering Ronaldo, it will return information for both Portuguese footballer Cristiano Ronaldo and Brazilian footballer Ronaldo. Therefore we suggest user to enter players’ full name.

![q2](https://cloud.githubusercontent.com/assets/16885033/18914492/5e53da5a-855b-11e6-9ba0-5709bcbf6a51.gif)

**Head To Head (Team Comparison) Query**: This query takes two teams as input. It will then return information about each game between the two teams throughout the history of the World Cup. It will also produce a graph comparing the rank for each team for each year they participated.

![q9](https://cloud.githubusercontent.com/assets/16885033/18914510/6b82146c-855b-11e6-86f4-c3e0e2b9a37a.gif)

**Team History Query**: This query takes a team and a year as input. It will return the team’s all-time achievement along with the position it obtained in a given Cup.

![q4](https://cloud.githubusercontent.com/assets/16885033/18914495/62ceeb4c-855b-11e6-88d8-99574b735a10.gif)

**Country Squads Query**: This query takes a team and a year (or all years) as input. It will list all participated players of the year(s) and number of goals they scored.

![q5](https://cloud.githubusercontent.com/assets/16885033/18914498/64d6a56a-855b-11e6-9810-d5c9c36bc6ea.gif)

**Interactive Map (Demo not available)**: This query will display a world map with each country that has attended world cup having a specific color based upon certain statistics. These statistics include how many times the countries within that continent have participated, how many wins that continent has, and how many times that continent has hosted a World Cup.

**Awards Query**: This query takes a year as input. Its output consists of the winners of the Golden Ball, Golden Boot, and Golden Glove awards along with relevant pictures.

![q7](https://cloud.githubusercontent.com/assets/16885033/18914501/67758f66-855b-11e6-8f96-094cbe22563f.gif)

**Historical Videos**: This query takes a year as input. It will return a page that has embedded videos of that year’s World Cup. Such videos include top goals, final game highlights, or most exciting moments.

![q8](https://cloud.githubusercontent.com/assets/16885033/18914504/694741d6-855b-11e6-875c-8b1219fe43c8.gif)

**List of Super Stars**: This query lists all the players that played in more than a Cup and the goals they scored in each of them.

![q3](https://cloud.githubusercontent.com/assets/16885033/18914493/5fa66f6c-855b-11e6-96ab-a0a84a27c18a.gif)

## Data Sources
http://www.fifa.com/ 

https://en.wikipedia.org/wiki/19XX_FIFA_World_Cup 

https://github.com/geraldb
