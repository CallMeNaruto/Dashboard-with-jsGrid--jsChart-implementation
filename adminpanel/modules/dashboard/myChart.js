
/* For Bar Graph 1*/
fetch('Api.php/getanalatics')
  .then(response => response.json())
  .then(data => {
    // Get data from API response
    const labels = ['Asian Countries', 'Europian Countries', 'American Countries', 'African Countries'];
    const values = [
      data.asiancountries,
      data.europiancountries,
      data.americancountries,
      data.africancountries
    ];
    
    // Create chart
    const ctx = document.getElementById('myChart').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Engagement',
          data: values,
          backgroundColor: 'rgb(179, 204, 255)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  })
  .catch(error => {
    console.error(error);
  });






/*Donut Chart
  fetch('Api.php/getanalatics')
  .then(response => response.json())
  .then(data => {
    // Get data from API response
    const labels = ['Total Email User Checkin', 'Today Email User Checkin', 'Total Product Sell', 'Today Product Sell'];
    const values = [
      data.totalemailsubscribe,
      data.todayemailsubscribe,
      data.totalcontactus,
      data.todaycontactus
    ];
    
    // Create chart
    const ctx = document.getElementById('myPieChart1').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: labels,
        datasets: [{
          label: 'Engagement',
          data: values,
          backgroundColor: [
            'rgba(255, 99, 132, 0.2)',
            'rgba(54, 162, 235, 0.2)',
            'rgba(255, 206, 86, 0.2)',
            'rgba(75, 192, 192, 0.2)'
          ],
          borderColor: [
            'rgba(255, 99, 132, 1)',
            'rgba(54, 162, 235, 1)',
            'rgba(255, 206, 86, 1)',
            'rgba(75, 192, 192, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        plugins: {
          legend: {
            display: true,
            position: 'right',
          },
        }
      }
    });
  })
  .catch(error => {
    console.error(error);
  });

*/

  /*Pie Chart*/
  fetch('Api.php/getanalatics')
  .then(response => response.json())
  .then(data => {
    // Get data from API response
    const labels = ['Retail',  'Construction'];
    const values = [
     
      data.Retail,
      data.Construction
    ];
    
    // Create chart
    const ctx = document.getElementById('myPieChart2').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'pie',
      data: {
        labels: labels,
        datasets: [{
          label: 'Retail vs Construction',
          data: values,
          backgroundColor: [
            'rgba(255, 99, 132, 1)',
            'rgb(179, 204, 255)'
          ],
          borderWidth: 1,
          borderColor: '#fff'
        }]
      },
      options: {
        plugins: {
          legend: {
            display: true,
            position: 'bottom',
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                var label = context.label || '';
                if (label) {
                  label += ': ';
                }
                if (context.parsed) {
                  label += new Intl.NumberFormat().format(context.parsed) + ' ';
                }
                label += 'entries';
                return label;
              }
            }
          }
        }
      }
    });
  })
  .catch(error => {
    console.error(error);
  })





/*Donut Chart 2*/
  fetch('Api.php/getanalatics')
  .then(response => response.json())
  .then(data => {
    // Get data from API response
    const labels = ['Automotive',  'Healthcare'];
    const values = [
      data.Automotive,
      data.Healthcare
    ];
    
    // Create chart
    const ctx = document.getElementById('myPieChart1').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'doughnut',
      data: {
        labels: labels,
        datasets: [{
          label: 'Automotive vs Healthcare',
          data: values,
          backgroundColor: [
            'rgba(255, 99, 132, 1)',
            'rgb(179, 204, 255)',
              ],
          borderWidth: 1,
          borderColor: '#fff'
        }]
      },
      options: {
        cutout: '80%',
        plugins: {
          legend: {
            display: true,
            position:'bottom',
          },
          tooltip: {
            callbacks: {
              label: function(context) {
                var label = context.label || '';
                if (label) {
                  label += ': ';
                }
                if (context.parsed) {
                  label += new Intl.NumberFormat().format(context.parsed) + ' ';
                }
                label += 'entries';
                return label;
              }
            }
          }
        }
      }
    });
  })
  .catch(error => {
    console.error(error);
  });



  
  /*Radar Chart*/
/*
  fetch('Api.php/getanalatics')
  .then(response => response.json())
  .then(data => {
    // Get data from API response
    const labels = ['Total Email User Checkin', 'Today Email User Checkin', 'Total Product Sell', 'Today Product Sell'];
    const values = [
      data.totalemailsubscribe,
      data.todayemailsubscribe,
      data.totalcontactus,
      data.todaycontactus
    ];
    
    // Create chart
    const ctx = document.getElementById('myChart2').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'radar',
      data: {
        labels: labels,
        datasets: [{
          label: 'Engagement',
          data: values,
          backgroundColor: 'rgba(255, 99, 132, 0.2)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 2
        }]
      },
      options: {
        scales: {
          r: {
            beginAtZero: true
          }
        }
      }
    });
  })
  .catch(error => {
    console.error(error);
  });*/
  fetch('Api.php/getanalatics')
  .then(response => response.json())
  .then(data => {
    // Get data from API response
    const labels = ['Energy Sector', 'IT Sector', 'Manufacturing Sector', 'Finance Sector'];
    const values = [
      data.energy,
      data.it,
      data.manufacturing,
      data.financialservices
    ];
    
    // Create chart
    const ctx = document.getElementById('myChart2').getContext('2d');
    const chart = new Chart(ctx, {
      type: 'line',
      data: {
        labels: labels,
        datasets: [{
          label: 'Top Four Sectors',
          data: values,
          backgroundColor: 'rgb(179, 204, 255)',
          borderColor: 'rgba(255, 99, 132, 1)',
          borderWidth: 2,
          pointRadius: 4,
          pointBackgroundColor: 'rgb(179, 204, 255)'
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  })
  .catch(error => {
    console.error(error);
  });