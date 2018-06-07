<?php

namespace Delejova\Combinate\Console\Commands;

use Illuminate\Console\Command;

class Combination extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'combinate:string {inputs?*}'; // vstupne argumenty su volitelne a rozny pocet

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command write combinations of strings';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
      parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {
      /* Ziskanie argumentov a priprava pola na triedenie */
      //ziskanie argumentov
      $arg = $this->arguments('inputs');
      // print_r($arg);    // arg ma 2 argumenty - commands a inputs - druhe je pole stringov na triedenie
      $strings = $arg['inputs'];    // pole stringov
      // print_r($strings);         // vypis pola stringov
      //$this->info(count($strings));       // pocet zadanych argumentov (stringov)

      /* Vypis zadanych argumentov */
      $this->info("Tvoje zadane argumenty su:\n".implode(" ", $strings));      // vypis zadanych argumentov
      if (count($strings) < 1){       // nebol zadany ziadny argument
          $this->info("Nezadal si ziadne argumenty. Zadaj aspon dve.");     
          return 0;     // ukoncenie vykonavanie funkcie
      }

      /* Vytvorenie jedinecnych dvojic zo stringov */
      $this->info("\nVytvorenie jedinecnych dvojic zo zadanych argumentov.");
      $this->makeCombinations($strings);                // vytvorenie dvojic

      /* Uspesne vykonanie commandu */
      //$this->info("\nCommand sa vykonal uspesne!");

    }

      /**
       * Vytvorenie, kotrola a vypis dvojic argumentov.
      */
      public function makeCombinations($strings){

        if ( count($strings) <= 1 ) {   // ohranicenie zdola - zadany len jeden string
              $result = $strings;
              $this->info("Zadal si malo argumentov na vytvorenie dvojice. Zadaj aspon dve.");
        // } else if ( count($strings) > 200 ) {   // ohranicenie zhora - zadanych nad 200 stringov
        //      $this->info("Zadal si velky pocet argumentov. Zadaj ich menej.");
        } else {
              $result = $this->combine($strings);     // ziska vytvorene jedinecne dvojice stringov

              // vypis ako pole
              $this->info("\nVypis dvojic ako pole: ");
              print_r($result);

              // vypis ako string
              $this->info("\nVypis dvojic ako retazce (string): ");
              for ( $i = 0; $i < count($result); ++$i ){
                  $this->info($result[$i]);
              }
          }

      }


      /**
       * Vytvori jedinecne dvojice zo zadanych stringov. Dvojicu ulozi ako prvok pola.
       *
       * @return array Pole s jedinecnymi dvojicami stringov.
      */
      public function combine($strings){
          $result = array();
          for ( $i = 0; $i < count($strings); ++$i ) {              // prejdenie celeho pola
              $firstword = $strings[$i];                            // vzatie jedneho stringu
              for ( $j = $i + 1 ; $j < count($strings); ++$j ) {    // vzatie zvysnych stringov
                  $result[] = $firstword . ' ' . $strings[$j];      // vytvorenie jedinecnej dvojice
              }
          }
          return $result;          // navratova hodnota - pole
      }

}
