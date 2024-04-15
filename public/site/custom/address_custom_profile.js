fetch('data.json')
.then(response => response.json())
.then(data => {

    var provinceDropdown = document.getElementById('city'); 
    var districtDropdown = document.getElementById('district');
    var wardDropdown = document.getElementById('ward');
    var communeDropdown = document.getElementById('ward');
    var city_post = document.getElementById('city_post');
    var district_post = document.getElementById('district_post');
    var ward_post = document.getElementById('ward_post');
    var selectedOption_city = provinceDropdown.options[provinceDropdown.selectedIndex];
    city_post.value = selectedOption_city.value.trim();

    var selectedOption_district = districtDropdown.options[districtDropdown.selectedIndex];
    district_post.value = selectedOption_district.value.trim();
    var selectedOption_ward = wardDropdown.options[wardDropdown.selectedIndex];
    ward_post.value = selectedOption_ward.value.trim();
    
    data.province.forEach(function(province) {
        var option = document.createElement('option');
        option.value = province.idProvince;
        option.textContent = province.name;
        provinceDropdown.appendChild(option);


    });

   
    provinceDropdown.addEventListener('change', function() {
        var selectedCityId = this.value; 
        
        var selectedOption = this.options[this.selectedIndex]; //
        city_post.value = selectedOption.textContent;
       
        districtDropdown.innerHTML = '';
        communeDropdown.innerHTML = '';

      
        data.district.forEach(function(district) {
            if (district.idProvince === selectedCityId) {
                var option = document.createElement('option');
                option.value = district.idDistrict;
                option.textContent = district.name;
                districtDropdown.appendChild(option);

                var selectedOption = districtDropdown.options[districtDropdown.selectedIndex];
                district_post.value = selectedOption.textContent;
            }
        });
    });

    districtDropdown.addEventListener('change', function() {
        var selectedDistrictId = this.value; 
        var selectedOption = this.options[this.selectedIndex]; 
        district_post.value = selectedOption.textContent;
        communeDropdown.innerHTML = '';



        data.commune.forEach(function(commune) {
            if (commune.idDistrict === selectedDistrictId) {
                var option = document.createElement('option');
                option.value = commune.idCommune;
                option.textContent = commune.name;
                communeDropdown.appendChild(option);
                var selectedOption = wardDropdown.options[wardDropdown.selectedIndex];
                ward_post.value = selectedOption.textContent;
            }
        });
    });
    wardDropdown.addEventListener('change', function() {
        var selectedDistrictId = this.value; 
        var selectedOption = this.options[this.selectedIndex]; //
        ward_post.value = selectedOption.textContent;
    });

})
