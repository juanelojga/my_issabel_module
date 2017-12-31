import $ from 'jquery';
import Chart from 'chart.js';

const randomScalingFactor = () => {
  return Math.round(Math.random() * 100);
};

$(document).ready(() => {
  const graphCanvas = "<canvas id='report-chart'></canvas>";
  $(graphCanvas).insertBefore('.neo-module-content');

  var config = {
    type: 'doughnut',
    data: {
      datasets: [
        {
          data: [
            randomScalingFactor(),
            randomScalingFactor(),
            randomScalingFactor(),
          ],
          backgroundColor: [
            'red',
            'orange',
            'yellow'
          ],
          label: 'Chart 1'
        }
      ],
      labels: [
        'Red',
        'Orange',
        'Yellow'
      ]
    },
    options: {
      title: {
        display: true,
        text: 'Issabel Chart'
      }
    }
  };

  const ctx = document.getElementById('report-chart').getContext('2d');

  new Chart(ctx, config);
});
