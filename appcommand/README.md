Laravel Framework v5.4.36

Aplikácia, ktorá pridá nový Command spustiteľný cez Artisan.
Zo série vstupných argumentov (stringov) vypíše všetky kombinácie dvojíc bez opakovania.


Príkaz na spustenie commandu v konzole:

php artisan combinate:string arg1 arg2 arg3


Vstup: Argumentami je ľubovoľný počet slov (string). 

Ošetrené sú hraničné situácie pre zadanie malého množstva stringov, kvôli ktorým nebude možné dvojicu vytvoriť.


Kód pre command sa nachádza v package:

AppCommand\packages\delejova\combinate\src\Console\Commands\Combination.php


Použitý algoritmus vytvárania dvojíc:

Cyklus v cykle. Vezme sa prvý prvok poľa a k nemu sa priradia všetky nasledujúce (zvyšné) prvky poľa.
vezme sa nasledujúci prvok poľa a k nemu sa priradia zvyšné. 
Takto vznikne jedinečná kombinácia všetkých dvojíc.


Načítanie 'packages' do novej laravel aplikácie:

1. Prekopírovať 'packages' do novej laravel aplikácie.

2. Do composer.json časti 'autoload' 'psr-4' prekopírovať: "Delejova\\Combinate\\": "packages/delejova/combinate/src"

3. Do 'config' 'app.php' k časti providers vložiť:         Delejova\Combinate\CombineServiceProvider::class

4. V konzole spustiť príkaz: composer dump-autoload

5. Po zadaní príkazu: 'php artisan' je dostupný príkaz 'combinate:string'

6. Zadat príkaz na vytvorenie dvojic zo zadanych argumentov: php artisan combinate:string arg1 arg2 arg3
