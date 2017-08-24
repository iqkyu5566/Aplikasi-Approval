$('#mekanisme').change(function(){
  if($(this).val() == 'transfer'){ // or this.value == 'volvo'
    $( "#pilihanbank" ).addClass( "show" );
  }
   if($(this).val() == 'tunai'){ // or this.value == 'volvo'
    $( "#pilihanbank" ).removeClass( "show" );
  }
});