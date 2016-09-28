# About This Project


# Introduction

The goal of this project is to design and implement a database system for the FIFA World Cup. The project has three major portions:

1. Data ETL: Study basic knowledge of FIFA World Cup and design database schema. Base on the research, write scripts to ETL data from public online sources to MySQL Database.

2. SQL queries and Web UI design: Write SQL queries. Create and implement the web-based user interface that can query the database through PHP functions.

3. Data Visualization: Convert data into plots or interactive maps that can help uses better comprehend the information. JavaScript HighChart and Tableau was used in this part.

# Function Overview

The project implements 9 queries:

1. Cups Query: This query takes a year and a team as input. It will return the host country, team rankings of the given Cup and game results for the given team.

2. Players Query: This query takes user input and will return the player’s participation in all Cups, the country he played with, goals he scored, birthday and age. For example, by entering Ronaldo, it will return information for both Portuguese footballer Cristiano Ronaldo and Brazilian footballer Ronaldo. Therefore we suggest user to enter players’ full name.

3. List of Super Stars: This query lists all the players that played in more than a Cup and the goals they scored in each of them.

4. Team History Query: This query takes a team and a year as input. It will return the team’s all-time achievement along with the position it obtained in a given Cup.

5. Country Squads Query: This query takes a team and a year (or all years) as input. It will list all participated players of the year(s) and number of goals they scored.

6. Interactive Map (Not available in this demo): This query will display a world map with each country that has attended world cup having a specific color based upon certain statistics. These statistics include how many times the countries within that continent have participated, how many wins that continent has, and how many times that continent has hosted a World Cup.

7. Awards Query: This query takes a year as input. Its output consists of the winners of the Golden Ball, Golden Boot, and Golden Glove awards along with relevant pictures.

8. Cup Overview Video: This query takes a year as input. It will return a page that has embedded videos of that year’s World Cup. Such videos include top goals, final game highlights, or most exciting moments.

9. Head To Head (Team Comparison) Query: This query takes two teams as input. It will then return information about each game between the two teams throughout the history of the World Cup. It will also produce a graph comparing the rank for each team for each year they participated.

Data Sources
http://www.fifa.com/ https://en.wikipedia.org/wiki/National_team_appearances_in_the_FIFA_World_Cup https://en.wikipedia.org/wiki/FIFA_World_Cup_awards https://en.wikipedia.org/wiki/19XX_FIFA_World_Cup https://en.wikipedia.org/wiki/19XX_FIFA_World_Cup_squads
https://github.com/geraldb
