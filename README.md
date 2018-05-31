# Pizzeria 
Laravel Framework 5.6.15
Burak Sen

## Uitleg
Pizzeria is een van de grootste projecten, waarbij ik veel heb leren programmeren in Laravel. 
Meer informatie over de functies vind je in het project zelf, tussen comentaar.

### Wat heb ik gebruikt?
Bootstrap, SASS, lightbox, jquey, seeder, migrations, Google en Stackoverflow

### functionaliteiten
```
Producten bekijken en beheren (wijzigen, verwijderen en aanmaken)
Bestellingen bekijken en beheren
Bestelling plaatsen
```

## Shopping Cart
Hierbij heb ik een classe Cart gebruikt. Toegevoegde producten worden onthouden in de '*sessions*'. De classe is niet volledig mijn idee, ik heb het gemaakt met voorbeelden en ideeën die ik op stackoverflow heb gevonden, wel heb ik het zelf uitgebreid en de berekeningen van producten zelf gemaakt.


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

## Mijn eigen feedback
Database normalisatie was niet volledig goed, dit heeft later ook een aantal problemen met zich meegenomen. 
Bij mijn volgende project (webshop) zal ik een aantal punten wel anders oppakken. Zoals de producten vanuit de database ophalen en niet in de code zelf. Ook ben ik een klein beetje in het Nederlands gaan programmeren, ik weet dat dit fout is, ik probeer het zo veel mogelijk in het Engels te houden.
