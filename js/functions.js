/**
 * Gets the value of the selected radio tag and updates the selector
 * @param brand : String
 */
getRadioVal = (brand) => {
    brand = brand.value;

    let ship_selector = document.getElementById('ship_selector');
    for(let i = 0; i <= ship_selector.length; i++){
        ship_selector.remove(i);
    }
    console.log(brand);
    switch(brand){
        case 'R':
            this.selectGenerator(ship_selector, [
                "Mariner of the Seas",
                "Liberty of the Seas",
                "Oasis of the Seas"
            ]);
            break;
        case 'C':
            this.selectGenerator(ship_selector, [
                'Apex',
                'Constellation',
                'Eclipse'
            ]);
            break;
        case 'Z':
            this.selectGenerator(ship_selector, [
                'Pursuit',
                'Journey',
                'Quest'
            ]);
            break;
    }
};

/**
 * Updates the selector with the given ships
 * @param selector
 * @param ships
 */
selectGenerator = (selector, ships) => {
    let new_option, index = 0;
    for(let i of ships){
        new_option = document.createElement("option");
        new_option.text = i;
        selector.add(new_option, selector[index++]);
    }
    selector.remove(selector.length-1);
};

/**
 * Sets the time range limits for the date selector.
 */
sailingDates = () => {
    let tomorrow = new Date();
    tomorrow.setDate(tomorrow.getDate()+1);
    tomorrow = tomorrow.toISOString().slice(0,10);
    document.getElementById('sail_date').setAttribute('min', tomorrow);

    let next2years = new Date();
    next2years.setFullYear(next2years.getFullYear()+2);
    next2years = next2years.toISOString().slice(0,10);
    document.getElementById('sail_date').setAttribute('max', next2years);
};

