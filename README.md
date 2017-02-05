# NutritionXpert
This is an application that provides the user with detailed nutritional information of ingredients or arbitrary 
combination thereof (recipes). This information can further be summed over entire weeks with detailed nutritional 
analysis.

## Setup
    ./bin/console doctrine:schema:create                    # Creates database
    ./bin/console doctrine:schema:create                    # Creates the schema
    ./bin/console assets:install --symlink                  # Install all the assets
    ./bin/console app:ingredients:swiss:import http://www.naehrwertdaten.ch/Swiss%20Food%20Comp%20Data%20V5.2.xlsx

## Future development
- RESTful API
- Order interface to different online stores

### Data Sources
- [USDA National Nutrient Database for Standard Reference](https://www.ars.usda.gov/northeast-area/beltsville-md/beltsville-human-nutrition-research-center/nutrient-data-laboratory/docs/sr28-download-files/)
- [Die Schweizer Nährwertdatenbank](http://www.naehrwertdaten.ch/request?xml=MessageData&xml=MetaData&xsl=Download&lan=de&pageKey=Start)

For now only the swiss nutrition database can be imported.