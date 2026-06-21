/**
 * R.G. Ambulance - Luxury Admin Theme
 * ApexCharts Theme + Animations
 */

document.addEventListener('DOMContentLoaded', function () {

    /* =============================================
       ApexCharts Theme
       ============================================= */
    if (typeof ApexCharts !== 'undefined') {
        window.Apex = {
            chart: {
                fontFamily: 'Outfit, sans-serif',
                foreColor: '#2A2A2A',
                toolbar: { show: false },
                background: '#FFFFFF'
            },
            colors: ['#D4AF37', '#C9A227', '#E5D6A0', '#B8860B', '#8B6914'],
            stroke: {
                curve: 'smooth',
                width: 3
            },
            grid: {
                borderColor: '#E5D6A0',
                strokeDashArray: 4
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shade: 'light',
                    type: 'vertical',
                    shadeIntensity: 0.2,
                    gradientToColors: ['#C9A227'],
                    opacityFrom: 0.35,
                    opacityTo: 0.05,
                    stops: [0, 100]
                }
            },
            dataLabels: {
                style: {
                    colors: ['#2A2A2A']
                }
            },
            tooltip: {
                theme: 'light',
                style: {
                    fontFamily: 'Outfit, sans-serif',
                    colors: ['#2A2A2A']
                },
                background: '#FFFFFF',
                borderColor: '#E5D6A0'
            },
            legend: {
                labels: {
                    colors: '#2A2A2A'
                }
            },
            xaxis: {
                labels: {
                    style: {
                        colors: '#2A2A2A',
                        fontFamily: 'Outfit, sans-serif'
                    }
                },
                axisBorder: {
                    color: '#E5D6A0'
                },
                axisTicks: {
                    color: '#E5D6A0'
                }
            },
            yaxis: {
                labels: {
                    style: {
                        colors: '#2A2A2A',
                        fontFamily: 'Outfit, sans-serif'
                    }
                }
            },
            plotOptions: {
                bar: {
                    columnWidth: '60%',
                    borderRadius: 4,
                    colors: {
                        ranges: [
                            { from: -Infinity, to: Infinity, color: '#D4AF37' }
                        ]
                    }
                },
                radialBar: {
                    hollow: {
                        background: '#FFFDF7'
                    },
                    track: {
                        background: '#E5D6A0'
                    },
                    dataLabels: {
                        name: { color: '#2A2A2A' },
                        value: { color: '#B8860B' }
                    }
                },
                pie: {
                    donut: {
                        labels: {
                            name: { color: '#2A2A2A' },
                            value: { color: '#B8860B' }
                        }
                    }
                }
            }
        };
    }

    /* =============================================
       Card Fade-In Animation
       ============================================= */
    function animateCards() {
        const cards = document.querySelectorAll('.fi-card, .filament-stats-card, .fi-widget');
        cards.forEach(function (card, index) {
            card.style.opacity = '0';
            card.style.transform = 'translateY(20px)';
            card.style.transition = 'opacity 0.5s ease, transform 0.5s ease';

            setTimeout(function () {
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, 80 * (index + 1));
        });
    }

    animateCards();

    document.addEventListener('livewire:navigated', function () {
        animateCards();
    });

    const sidebarIcons = document.querySelectorAll('.fi-sidebar-item-icon');
    sidebarIcons.forEach(function (icon) {
        icon.addEventListener('mouseenter', function () {
            this.style.transform = 'scale(1.1)';
            this.style.transition = 'transform 0.2s ease';
        });
        icon.addEventListener('mouseleave', function () {
            this.style.transform = 'scale(1)';
        });
    });

});
