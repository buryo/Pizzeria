# Pizzeria 
Laravel Framework 5.6.15
Burak Sen

## Uitleg
Pizzeria is een van de grootste projecten, die ik in Laravel heb mogen maken.
Meer informatie vind je in het project zelf.

### Wat heb ik gebruikt?
Bootstrap, SASS, lightbox, jquey, seeder, migrations, Google en Stackoverflow

### functionaliteiten
```
Producten bekijken en beheren (wijzigen, verwijderen en aanmaken)
Bestellingen bekijken en beheren
Bestelling plaatsen
```

## Shopping Cart
Hierbij heb ik een classe Cart aangemaakt. Toegevoegde producten worden onthouden in de '*sessions*'. De classe is niet volledig mijn idee, ik heb het gemaakt met voorbeelden en ideeën die ik op stackoverflow heb gevonden, wel heb ik het zelf uitgebreid en de berekeningen van producten zelf gemaakt.


```
public $items = null;
public $totalQty = 0;
public $totalPrice = 0;
```


## Online bekijken
Online bekijken is mogelijk via deze link [Pizzeria](http://pizzeria.bsenn.nl).

## Inloggen als admin
Om de admin beheer te kunnen zien moet je ingelogd zijn. 

1) ga naar de login pagina [Pizzeria login](http://pizzeria.bsenn.nl/login)
2) Gebrukersnaam : admin
3) Wachtwoord : 123456
