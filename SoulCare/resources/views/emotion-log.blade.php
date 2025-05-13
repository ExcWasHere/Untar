<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoulCare - Emotion Log</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .flower-petal {
            transition: all 0.7s ease;
        }import { useState, useEffect } from 'react';

export default function EmotionalFlower() {
  const [currentEmotion, setCurrentEmotion] = useState('biasa');
  const [note, setNote] = useState('');
  const [saveEnabled, setSaveEnabled] = useState(false);
  const [emotionHistory, setEmotionHistory] = useState([]);

  useEffect(() => {
    // Load history from localStorage on component mount
    const storedEmotions = localStorage.getItem('emotions');
    if (storedEmotions) {
      setEmotionHistory(JSON.parse(storedEmotions));
    }
  }, []);

  const emotions = {
    'sangat-baik': {
      emoji: '😄',
      label: 'Sangat Baik',
      color: 'bg-green-100',
      textColor: 'text-green-700',
      hoverColor: 'hover:bg-green-200',
      petalColor: 'bg-pink-400',
      petalOpacity: 'opacity-100',
      petalScale: 'scale-125',
      stemColor: 'bg-green-600',
      stemHeight: 'h-40',
      stemRotate: 'rotate-0',
      centerColor: 'bg-yellow-300',
      leafColor: 'bg-green-400',
      leafOpacity: 'opacity-100'
    },
    'baik': {
      emoji: '🙂',
      label: 'Baik',
      color: 'bg-green-50',
      textColor: 'text-green-600',
      hoverColor: 'hover:bg-green-200',
      petalColor: 'bg-pink-400',
      petalOpacity: 'opacity-90',
      petalScale: 'scale-110',
      stemColor: 'bg-green-500',
      stemHeight: 'h-36',
      stemRotate: 'rotate-0',
      centerColor: 'bg-yellow-300',
      leafColor: 'bg-green-300',
      leafOpacity: 'opacity-90'
    },
    'biasa': {
      emoji: '😐',
      label: 'Biasa',
      color: 'bg-blue-50',
      textColor: 'text-blue-600',
      hoverColor: 'hover:bg-blue-100',
      petalColor: 'bg-pink-300',
      petalOpacity: 'opacity-90',
      petalScale: 'scale-100',
      stemColor: 'bg-green-500',
      stemHeight: 'h-32',
      stemRotate: 'rotate-0',
      centerColor: 'bg-yellow-200',
      leafColor: 'bg-green-300',
      leafOpacity: 'opacity-90'
    },
    'sedih': {
      emoji: '😔',
      label: 'Sedih',
      color: 'bg-yellow-50',
      textColor: 'text-yellow-600',
      hoverColor: 'hover:bg-yellow-100',
      petalColor: 'bg-pink-200',
      petalOpacity: 'opacity-80',
      petalScale: 'scale-90',
      stemColor: 'bg-green-600',
      stemHeight: 'h-28',
      stemRotate: '-rotate-3',
      centerColor: 'bg-yellow-100',
      leafColor: 'bg-green-300',
      leafOpacity: 'opacity-80'
    },
    'cemas': {
      emoji: '😰',
      label: 'Cemas',
      color: 'bg-orange-50',
      textColor: 'text-orange-600',
      hoverColor: 'hover:bg-orange-100',
      petalColor: 'bg-pink-100',
      petalOpacity: 'opacity-60',
      petalScale: 'scale-75',
      stemColor: 'bg-green-500',
      stemHeight: 'h-24',
      stemRotate: '-rotate-6',
      centerColor: 'bg-yellow-100',
      leafColor: 'bg-green-200',
      leafOpacity: 'opacity-60'
    },
    'marah': {
      emoji: '😡',
      label: 'Marah',
      color: 'bg-red-50',
      textColor: 'text-red-600',
      hoverColor: 'hover:bg-red-100',
      petalColor: 'bg-pink-100',
      petalOpacity: 'opacity-50',
      petalScale: 'scale-75',
      stemColor: 'bg-green-400',
      stemHeight: 'h-20',
      stemRotate: '-rotate-12',
      centerColor: 'bg-yellow-100',
      leafColor: 'bg-green-100',
      leafOpacity: 'opacity-50'
    }
  };

  const selectEmotion = (emotion) => {
    setCurrentEmotion(emotion);
    setSaveEnabled(true);
  };

  const saveEmotion = () => {
    const now = new Date();
    const formattedDate = `${now.getDate().toString().padStart(2, '0')}/${(now.getMonth() + 1).toString().padStart(2, '0')}/${now.getFullYear()}`;
    const formattedTime = `${now.getHours().toString().padStart(2, '0')}:${now.getMinutes().toString().padStart(2, '0')}`;
    
    const newEmotion = {
      id: Date.now(),
      emotion: currentEmotion,
      note: note,
      date: formattedDate,
      time: formattedTime,
      timestamp: now.getTime()
    };
    
    const updatedHistory = [newEmotion, ...emotionHistory];
    setEmotionHistory(updatedHistory);
    localStorage.setItem('emotions', JSON.stringify(updatedHistory));
    
    setNote('');
    setSaveEnabled(false);
    
    // Alert could be replaced with a nicer toast notification
    alert('Emosi berhasil disimpan!');
  };

  const deleteEmotion = (id) => {
    if (confirm('Apakah Anda yakin ingin menghapus catatan emosi ini?')) {
      const updatedHistory = emotionHistory.filter(item => item.id !== id);
      setEmotionHistory(updatedHistory);
      localStorage.setItem('emotions', JSON.stringify(updatedHistory));
    }
  };

  const filterHistory = (days) => {
    const now = new Date().getTime();
    const dayInMs = 24 * 60 * 60 * 1000;
    return emotionHistory.filter(item => (now - item.timestamp) <= days * dayInMs);
  };

  return (
    <div className="grid grid-cols-1 md:grid-cols-2 gap-8">
      {/* Bunga dan Input Emosi */}
      <div className="bg-purple-100 p-6 rounded-xl shadow-lg">
        <h2 className="text-xl font-semibold text-purple-800 mb-4">Taman Emosi Anda</h2>
        
        {/* 3D Flower */}
        <div className="flex justify-center mb-8">
          <div className="relative w-64 h-80 perspective-1000 transform-gpu">
            {/* Pot Bunga with 3D effect */}
            <div className="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-32 h-16 bg-amber-700 rounded-t-lg rounded-b-xl shadow-lg z-10">
              <div className="absolute top-0 left-0 w-full h-full bg-amber-800 opacity-30 rounded-t-lg rounded-b-xl transform skew-x-12 translate-x-3 scale-95"></div>
            </div>
            <div className="absolute bottom-16 left-1/2 transform -translate-x-1/2 w-40 h-6 bg-amber-800 rounded-t-3xl z-20 shadow-md"></div>
            
            {/* Tanah with 3D texture */}
            <div className="absolute bottom-12 left-1/2 transform -translate-x-1/2 w-28 h-10 bg-amber-900 rounded-t-full z-30">
              <div className="absolute inset-0 bg-gradient-to-br from-amber-800 to-amber-950 opacity-50 rounded-t-full"></div>
              <div className="absolute w-20 h-2 bg-amber-700 rounded-full bottom-2 left-4 opacity-40"></div>
              <div className="absolute w-8 h-1 bg-amber-700 rounded-full bottom-5 left-10 opacity-30"></div>
            </div>
            
            {/* Batang Bunga with 3D effect */}
            <div className={`absolute bottom-20 left-1/2 transform -translate-x-1/2 w-3 ${emotions[currentEmotion].stemHeight} ${emotions[currentEmotion].stemColor} ${emotions[currentEmotion].stemRotate} transition-all duration-700 ease-in-out z-20`}>
              {/* Stem highlight for 3D effect */}
              <div className="absolute top-0 left-0 w-1 h-full bg-white opacity-20 rounded-l-full"></div>
            </div>
            
            {/* Daun Kiri with 3D effect */}
            <div className={`absolute bottom-40 left-1/2 transform -translate-x-12 w-12 h-8 ${emotions[currentEmotion].leafColor} ${emotions[currentEmotion].leafOpacity} rounded-full skew-x-12 transition-all duration-700 z-10 shadow-sm`}>
              {/* Leaf vein */}
              <div className="absolute top-1/2 left-0 w-full h-px bg-green-800 opacity-20 transform -rotate-12"></div>
              <div className="absolute top-0 left-0 w-full h-full bg-white opacity-10 rounded-full transform scale-90"></div>
            </div>
            
            {/* Daun Kanan with 3D effect */}
            <div className={`absolute bottom-48 left-1/2 transform translate-x-4 w-12 h-8 ${emotions[currentEmotion].leafColor} ${emotions[currentEmotion].leafOpacity} rounded-full -skew-x-12 transition-all duration-700 z-30 shadow-sm`}>
              {/* Leaf vein */}
              <div className="absolute top-1/2 left-0 w-full h-px bg-green-800 opacity-20 transform rotate-12"></div>
              <div className="absolute top-0 left-0 w-full h-full bg-white opacity-10 rounded-full transform scale-90"></div>
            </div>
            
            {/* Bunga with 3D petals */}
            <div className={`absolute top-6 left-1/2 transform -translate-x-1/2 transition-all duration-700 ${emotions[currentEmotion].petalScale} z-40`}>
              {/* Kelopak Bunga with 3D effect */}
              <div className={`absolute w-16 h-16 ${emotions[currentEmotion].petalColor} ${emotions[currentEmotion].petalOpacity} rounded-full transform -translate-x-8 -translate-y-8 transition-all duration-700 shadow-md rotate-12`}>
                <div className="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-white to-transparent opacity-30 rounded-full"></div>
              </div>
              <div className={`absolute w-16 h-16 ${emotions[currentEmotion].petalColor} ${emotions[currentEmotion].petalOpacity} rounded-full transform translate-x-8 -translate-y-8 transition-all duration-700 shadow-md -rotate-12`}>
                <div className="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-white to-transparent opacity-30 rounded-full"></div>
              </div>
              <div className={`absolute w-16 h-16 ${emotions[currentEmotion].petalColor} ${emotions[currentEmotion].petalOpacity} rounded-full transform -translate-x-8 translate-y-8 transition-all duration-700 shadow-md -rotate-12`}>
                <div className="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-white to-transparent opacity-30 rounded-full"></div>
              </div>
              <div className={`absolute w-16 h-16 ${emotions[currentEmotion].petalColor} ${emotions[currentEmotion].petalOpacity} rounded-full transform translate-x-8 translate-y-8 transition-all duration-700 shadow-md rotate-12`}>
                <div className="absolute top-0 left-0 w-full h-full bg-gradient-to-br from-white to-transparent opacity-30 rounded-full"></div>
              </div>
              
              {/* Pusat Bunga with 3D effect */}
              <div className={`absolute w-10 h-10 ${emotions[currentEmotion].centerColor} rounded-full transform -translate-x-5 -translate-y-5 z-50 shadow-inner`}>
                <div className="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-6 h-6 bg-yellow-500 rounded-full opacity-60"></div>
                <div className="absolute top-1/4 left-1/4 w-2 h-2 bg-yellow-100 rounded-full opacity-80"></div>
              </div>
            </div>
          </div>
        </div>
        
        {/* Input Emosi */}
        <div>
          <h3 className="text-lg font-medium text-purple-700 mb-3">Bagaimana perasaan Anda hari ini?</h3>
          <div className="grid grid-cols-3 gap-3">
            {Object.entries(emotions).map(([key, emotion]) => (
              <button 
                key={key}
                onClick={() => selectEmotion(key)} 
                className={`emotion-btn flex flex-col items-center justify-center p-3 ${emotion.color} rounded-lg ${emotion.hoverColor} transform transition-all duration-300 ${currentEmotion === key ? 'ring-2 ring-offset-2 ring-purple-500 -translate-y-1' : ''}`}
              >
                <span className="text-2xl">{emotion.emoji}</span>
                <span className={`text-sm font-medium ${emotion.textColor} mt-1`}>{emotion.label}</span>
              </button>
            ))}
          </div>
          
          <div className="mt-5">
            <label htmlFor="note" className="block text-sm font-medium text-gray-700 mb-1">Catatan (opsional)</label>
            <textarea 
              id="note" 
              value={note}
              onChange={(e) => setNote(e.target.value)}
              className="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" 
              rows="2" 
              placeholder="Tambahkan catatan tentang perasaan Anda..."
            />
            
            <button 
              onClick={saveEmotion}
              disabled={!saveEnabled}
              className={`mt-3 px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 transition-all duration-300 transform ${saveEnabled ? 'hover:-translate-y-1' : 'opacity-50'}`}
            >
              Simpan Emosi Hari Ini
            </button>
          </div>
        </div>
      </div>
      
      {/* Riwayat Emosi */}
      <div className="bg-purple-100 p-6 rounded-xl shadow-lg">
        <div className="flex justify-between items-center mb-4">
          <h2 className="text-xl font-semibold text-purple-800">Riwayat Emosi</h2>
          
          <div className="flex space-x-2">
            <button 
              className="px-3 py-1 text-sm bg-purple-200 text-purple-800 rounded-lg hover:bg-purple-300 transition-colors"
              onClick={() => setEmotionHistory(filterHistory(7))}
            >
              7 Hari
            </button>
            <button 
              className="px-3 py-1 text-sm bg-purple-100 text-purple-700 rounded-lg hover:bg-purple-300 transition-colors"
              onClick={() => setEmotionHistory(filterHistory(30))}
            >
              30 Hari
            </button>
          </div>
        </div>
        
        <div className="space-y-3 max-h-96 overflow-y-auto p-1">
          {emotionHistory.length === 0 ? (
            <div className="text-center p-6 text-gray-500">Belum ada data emosi. Mulai catat emosi pertama Anda!</div>
          ) : (
            emotionHistory.map(item => {
              const emotion = emotions[item.emotion];
              return (
                <div key={item.id} className={`p-4 ${emotion.color} rounded-lg flex items-start shadow-sm hover:translate-x-1 transition-all duration-300`}>
                  <div className="text-2xl mr-3">{emotion.emoji}</div>
                  <div className="flex-grow">
                    <div className="flex justify-between items-start">
                      <h4 className={`font-medium ${emotion.textColor}`}>{emotion.label}</h4>
                      <span className="text-xs text-gray-500">{item.date} · {item.time}</span>
                    </div>
                    {item.note && <p className="text-sm text-gray-600 mt-1">{item.note}</p>}
                  </div>
                  <button 
                    onClick={() => deleteEmotion(item.id)} 
                    className="ml-2 text-gray-400 hover:text-red-500 transition-colors"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" className="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                    </svg>
                  </button>
                </div>
              );
            })
          )}
        </div>
      </div>
    </div>
  );
}
        
        .emotion-btn:hover {
            transform: translateY(-5px);
            transition: all 0.3s ease;
        }
        
        .emotion-btn:active {
            transform: scale(0.95);
        }
        
        .history-item {
            transition: all 0.3s ease;
        }
        
        .history-item:hover {
            transform: translateX(5px);
        }
    </style>
</head>
<body class="bg-white">
    <div class="flex">
        <!-- Sidebar -->
       <div class="fixed inset-y-0 left-0 w-64 bg-purple-300 shadow-lg">
        <div class="flex items-center justify-center h-16 border-b border-purple-400">
            <h2 class="text-2xl font-bold text-purple-900">SoulCare</h2>
        </div>
        <nav class="mt-6">
            <div class="px-4 space-y-2">
                <a href="/dashboard" class="flex items-center px-4 py-3 text-purple-900 hover:bg-white rounded-lg">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                    </svg>
                    <span>Dashboard</span>
                </a>
                <a href="/emotions" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    <span>Emotion Log</span>
                </a>
                <a href="/social-flow" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span>Social Flow</span>
                </a>
                <a href="/consultation" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                    </svg>
                    <span>Consultation</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4" />
                    </svg>
                    <span>Release your emotion</span>
                </a>
                <a href="#" class="flex items-center px-4 py-3 text-purple-800 transition-colors rounded-lg hover:bg-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                    </svg>
                    <span>Hope Scan</span>
                </a>
            </div>
        </nav>
    </div>
        
        <!-- Main Content -->
        <div class="ml-64 p-8 w-full">
            <div class="max-w-5xl mx-auto">
                <h1 class="text-3xl font-bold text-purple-900 mb-8">Emotion Log</h1>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Bunga dan Input Emosi -->
                    <div class="bg-amber-100 p-6 rounded-xl shadow-lg">
                        <h2 class="text-xl font-semibold text-purple-800 mb-4">Taman Emosi Anda</h2>
                        
                        <!-- Bunga -->
                        <div class="flex justify-center mb-8">
                            <div id="flower-container" class="relative w-64 h-80">
                                <!-- Pot Bunga -->
                                <div class="absolute bottom-0 left-1/2 transform -translate-x-1/2 w-32 h-20 bg-amber-700 rounded-b-lg"></div>
                                <div class="absolute bottom-20 left-1/2 transform -translate-x-1/2 w-40 h-6 bg-amber-800 rounded-t-3xl"></div>
                                
                                <!-- Tanah -->
                                <div class="absolute bottom-16 left-1/2 transform -translate-x-1/2 w-28 h-10 bg-amber-900 rounded-t-full"></div>
                                
                                <!-- Batang Bunga -->
                                <div id="stem" class="absolute bottom-20 left-1/2 transform -translate-x-1/2 w-3 h-40 bg-green-500 transition-all duration-700"></div>
                                
                                <!-- Daun Kiri -->
                                <div id="leaf-left" class="absolute bottom-40 left-1/2 transform -translate-x-12 w-12 h-8 bg-green-400 rounded-full skew-x-12 transition-all duration-700"></div>
                                
                                <!-- Daun Kanan -->
                                <div id="leaf-right" class="absolute bottom-48 left-1/2 transform translate-x-4 w-12 h-8 bg-green-400 rounded-full -skew-x-12 transition-all duration-700"></div>
                                
                                <!-- Bunga -->
                                <div id="flower" class="absolute top-6 left-1/2 transform -translate-x-1/2 transition-all duration-700">
                                    <!-- Kelopak Bunga -->
                                    <div id="petal-1" class="flower-petal absolute w-16 h-16 bg-pink-400 rounded-full transform -translate-x-8 -translate-y-8"></div>
                                    <div id="petal-2" class="flower-petal absolute w-16 h-16 bg-pink-400 rounded-full transform translate-x-8 -translate-y-8"></div>
                                    <div id="petal-3" class="flower-petal absolute w-16 h-16 bg-pink-400 rounded-full transform -translate-x-8 translate-y-8"></div>
                                    <div id="petal-4" class="flower-petal absolute w-16 h-16 bg-pink-400 rounded-full transform translate-x-8 translate-y-8"></div>
                                    
                                    <!-- Pusat Bunga -->
                                    <div id="flower-center" class="absolute w-10 h-10 bg-yellow-400 rounded-full transform -translate-x-5 -translate-y-5 z-10"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Input Emosi -->
                        <div>
                            <h3 class="text-lg font-medium text-purple-700 mb-3">Bagaimana perasaan Anda hari ini?</h3>
                            <div class="grid grid-cols-3 gap-3">
                                <button onclick="updateEmotion('sangat-baik')" class="emotion-btn flex flex-col items-center justify-center p-3 bg-green-100 rounded-lg hover:bg-green-200">
                                    <span class="text-2xl">😄</span>
                                    <span class="text-sm font-medium text-green-700 mt-1">Sangat Baik</span>
                                </button>
                                
                                <button onclick="updateEmotion('baik')" class="emotion-btn flex flex-col items-center justify-center p-3 bg-green-50 rounded-lg hover:bg-green-200">
                                    <span class="text-2xl">🙂</span>
                                    <span class="text-sm font-medium text-green-600 mt-1">Baik</span>
                                </button>
                                
                                <button onclick="updateEmotion('biasa')" class="emotion-btn flex flex-col items-center justify-center p-3 bg-blue-50 rounded-lg hover:bg-blue-100">
                                    <span class="text-2xl">😐</span>
                                    <span class="text-sm font-medium text-blue-600 mt-1">Biasa</span>
                                </button>
                                
                                <button onclick="updateEmotion('sedih')" class="emotion-btn flex flex-col items-center justify-center p-3 bg-yellow-50 rounded-lg hover:bg-yellow-100">
                                    <span class="text-2xl">😔</span>
                                    <span class="text-sm font-medium text-yellow-600 mt-1">Sedih</span>
                                </button>
                                
                                <button onclick="updateEmotion('cemas')" class="emotion-btn flex flex-col items-center justify-center p-3 bg-orange-50 rounded-lg hover:bg-orange-100">
                                    <span class="text-2xl">😰</span>
                                    <span class="text-sm font-medium text-orange-600 mt-1">Cemas</span>
                                </button>
                                
                                <button onclick="updateEmotion('marah')" class="emotion-btn flex flex-col items-center justify-center p-3 bg-red-50 rounded-lg hover:bg-red-100">
                                    <span class="text-2xl">😡</span>
                                    <span class="text-sm font-medium text-red-600 mt-1">Marah</span>
                                </button>
                            </div>
                            
                            <div class="mt-5">
                                <label for="note" class="block text-sm font-medium text-gray-700 mb-1">Catatan (opsional)</label>
                                <textarea id="note" class="w-full p-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-purple-500" rows="2" placeholder="Tambahkan catatan tentang perasaan Anda..."></textarea>
                                
                                <button id="save-btn" onclick="saveEmotion()" class="mt-3 px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-900 focus:outline-none focus:ring-2 focus:ring-purple-500 focus:ring-offset-2 disabled:opacity-50" disabled>
                                    Simpan Emosi Hari Ini
                                </button>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Riwayat Emosi -->
                    <div class="bg-amber-100 p-6 rounded-xl shadow-lg">
                        <div class="flex justify-between items-center mb-4">
                            <h2 class="text-xl font-semibold text-purple-800">Riwayat Emosi</h2>
                            
                            <div class="flex space-x-2">
                                <button class="px-3 py-1 text-sm bg-purple-100 text-purple-800 rounded-lg hover:bg-purple-200 active">7 Hari</button>
                                <button class="px-3 py-1 text-sm bg-gray-100 text-gray-600 rounded-lg hover:bg-gray-200">30 Hari</button>
                            </div>
                        </div>
                        
                        <div id="emotion-history" class="space-y-3 max-h-[480px] overflow-y-auto p-1">
                            <!-- Riwayat akan diisi melalui JavaScript -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        // State untuk menyimpan data emosi (lokal saja, belum ke database)
        let emotions = [];
        let selectedEmotion = null;
        
        // Fungsi untuk menyimpan emosi di local storage
        function saveEmotionsToLocalStorage() {
            localStorage.setItem('emotions', JSON.stringify(emotions));
        }
        
        // Fungsi untuk memuat emosi dari local storage
        function loadEmotionsFromLocalStorage() {
            const stored = localStorage.getItem('emotions');
            emotions = stored ? JSON.parse(stored) : [];
            renderEmotionHistory();
        }
        
        // Fungsi untuk mengupdate tampilan bunga berdasarkan emosi
        function updateEmotion(emotion) {
            selectedEmotion = emotion;
            
            // Reset semua tombol
            document.querySelectorAll('.emotion-btn').forEach(btn => {
                btn.classList.remove('ring-2', 'ring-offset-2', 'ring-purple-500');
            });
            
            // Highlight tombol yang dipilih
            event.currentTarget.classList.add('ring-2', 'ring-offset-2', 'ring-purple-500');
            
            // Aktifkan tombol simpan
            document.getElementById('save-btn').disabled = false;
            
            // Update tampilan bunga
            updateFlowerAppearance(emotion);
        }
        
        // Fungsi untuk mengubah tampilan bunga berdasarkan emosi
        function updateFlowerAppearance(emotion) {
            const stem = document.getElementById('stem');
            const leafLeft = document.getElementById('leaf-left');
            const leafRight = document.getElementById('leaf-right');
            const flower = document.getElementById('flower');
            const petals = document.querySelectorAll('.flower-petal');
            const flowerCenter = document.getElementById('flower-center');
            
            // Reset animasi
            stem.style.transition = 'all 0.7s ease';
            leafLeft.style.transition = 'all 0.7s ease';
            leafRight.style.transition = 'all 0.7s ease';
            flower.style.transition = 'all 0.7s ease';
            petals.forEach(petal => petal.style.transition = 'all 0.7s ease');
            flowerCenter.style.transition = 'all 0.7s ease';
            
            switch(emotion) {
                case 'sangat-baik':
                    // Bunga mekar sempurna
                    stem.style.height = '40rem';
                    stem.style.backgroundColor = '#16a34a'; // Green-600
                    leafLeft.style.backgroundColor = '#4ade80'; // Green-400
                    leafRight.style.backgroundColor = '#4ade80'; // Green-400
                    flower.style.transform = 'translate(-50%, 0) scale(1.2)';
                    petals.forEach(petal => {
                        petal.style.backgroundColor = '#ec4899'; // Pink-500
                        petal.style.opacity = '1';
                        petal.style.transform = petal.style.transform.replace('scale(0.7)', 'scale(1.2)');
                    });
                    flowerCenter.style.backgroundColor = '#fcd34d'; // Yellow-300
                    break;
                    
                case 'baik':
                    // Bunga mekar baik
                    stem.style.height = '35rem';
                    stem.style.backgroundColor = '#22c55e'; // Green-500
                    leafLeft.style.backgroundColor = '#86efac'; // Green-300
                    leafRight.style.backgroundColor = '#86efac'; // Green-300
                    flower.style.transform = 'translate(-50%, 0) scale(1.1)';
                    petals.forEach(petal => {
                        petal.style.backgroundColor = '#f472b6'; // Pink-400
                        petal.style.opacity = '1';
                        petal.style.transform = petal.style.transform.replace('scale(0.7)', 'scale(1)');
                    });
                    flowerCenter.style.backgroundColor = '#fde047'; // Yellow-300
                    break;
                    
                case 'biasa':
                    // Bunga normal
                    stem.style.height = '32rem';
                    stem.style.backgroundColor = '#10b981'; // Green-500
                    leafLeft.style.backgroundColor = '#6ee7b7'; // Green-300
                    leafRight.style.backgroundColor = '#6ee7b7'; // Green-300
                    flower.style.transform = 'translate(-50%, 0) scale(1)';
                    petals.forEach(petal => {
                        petal.style.backgroundColor = '#f9a8d4'; // Pink-300
                        petal.style.opacity = '0.9';
                        petal.style.transform = petal.style.transform.replace('scale(0.7)', 'scale(1)');
                    });
                    flowerCenter.style.backgroundColor = '#fef08a'; // Yellow-200
                    break;
                    
                case 'sedih':
                    // Bunga sedikit layu
                    stem.style.height = '30rem';
                    stem.style.backgroundColor = '#65a30d'; // Green-600
                    stem.style.transform = 'translate(-50%, 0) rotate(-5deg)';
                    leafLeft.style.backgroundColor = '#bef264'; // Green-300
                    leafLeft.style.opacity = '0.8';
                    leafRight.style.backgroundColor = '#bef264'; // Green-300
                    leafRight.style.opacity = '0.8';
                    flower.style.transform = 'translate(-50%, 0) scale(0.9) rotate(5deg)';
                    petals.forEach(petal => {
                        petal.style.backgroundColor = '#fbcfe8'; // Pink-200
                        petal.style.opacity = '0.8';
                        petal.style.transform = petal.style.transform.replace('scale(1)', 'scale(0.9)');
                    });
                    flowerCenter.style.backgroundColor = '#fef9c3'; // Yellow-100
                    break;
                    
                case 'cemas':
                    // Bunga lebih layu
                    stem.style.height = '25rem';
                    stem.style.backgroundColor = '#84cc16'; // Green-500
                    stem.style.transform = 'translate(-50%, 0) rotate(-10deg)';
                    leafLeft.style.backgroundColor = '#d9f99d'; // Green-200
                    leafLeft.style.opacity = '0.6';
                    leafRight.style.backgroundColor = '#d9f99d'; // Green-200
                    leafRight.style.opacity = '0.6';
                    flower.style.transform = 'translate(-50%, 0) scale(0.8) rotate(10deg)';
                    petals.forEach(petal => {
                        petal.style.backgroundColor = '#fed7e2'; // Pink-100
                        petal.style.opacity = '0.6';
                        petal.style.transform = petal.style.transform.replace('scale(1)', 'scale(0.8)');
                    });
                    flowerCenter.style.backgroundColor = '#fef9c3'; // Yellow-100
                    flowerCenter.style.opacity = '0.8';
                    break;
                    
                case 'marah':
                    // Bunga sangat layu
                    stem.style.height = '20rem';
                    stem.style.backgroundColor = '#a3e635'; // Green-400
                    stem.style.transform = 'translate(-50%, 0) rotate(-15deg)';
                    leafLeft.style.backgroundColor = '#ecfccb'; // Green-100
                    leafLeft.style.opacity = '0.5';
                    leafRight.style.backgroundColor = '#ecfccb'; // Green-100
                    leafRight.style.opacity = '0.5';
                    flower.style.transform = 'translate(-50%, 0) scale(0.7) rotate(15deg)';
                    petals.forEach(petal => {
                        petal.style.backgroundColor = '#ffe4e6'; // Pink-100
                        petal.style.opacity = '0.5';
                        petal.style.transform = petal.style.transform.replace('scale(1)', 'scale(0.7)');
                    });
                    flowerCenter.style.backgroundColor = '#fef9c3'; // Yellow-100
                    flowerCenter.style.opacity = '0.6';
                    break;
            }
        }
        
        // Fungsi untuk menyimpan emosi
        function saveEmotion() {
            if (!selectedEmotion) return;
            
            const note = document.getElementById('note').value;
            const currentDate = new Date();
            
            // Format tanggal: DD/MM/YYYY
            const formattedDate = `${currentDate.getDate().toString().padStart(2, '0')}/${(currentDate.getMonth() + 1).toString().padStart(2, '0')}/${currentDate.getFullYear()}`;
            
            // Format waktu: HH:MM
            const formattedTime = `${currentDate.getHours().toString().padStart(2, '0')}:${currentDate.getMinutes().toString().padStart(2, '0')}`;
            
            // Buat entry emosi baru
            const newEmotion = {
                id: Date.now(), // ID unik menggunakan timestamp
                emotion: selectedEmotion,
                note: note,
                date: formattedDate,
                time: formattedTime,
                timestamp: currentDate.getTime()
            };
            
            // Tambahkan ke daftar emosi
            emotions.unshift(newEmotion); // Tambahkan di awal array
            
            // Simpan ke local storage
            saveEmotionsToLocalStorage();
            
            // Render ulang daftar emosi
            renderEmotionHistory();
            
            // Reset input
            document.getElementById('note').value = '';
            selectedEmotion = null;
            document.getElementById('save-btn').disabled = true;
            
            // Reset highlight pada tombol
            document.querySelectorAll('.emotion-btn').forEach(btn => {
                btn.classList.remove('ring-2', 'ring-offset-2', 'ring-purple-500');
            });
            
            // Tampilkan pesan sukses
            alert('Emosi berhasil disimpan!');
        }
        
        // Fungsi untuk menampilkan riwayat emosi
        function renderEmotionHistory() {
            const historyContainer = document.getElementById('emotion-history');
            historyContainer.innerHTML = '';
            
            if (emotions.length === 0) {
                historyContainer.innerHTML = '<div class="text-center p-6 text-gray-500">Belum ada data emosi. Mulai catat emosi pertama Anda!</div>';
                return;
            }
            
            emotions.forEach(item => {
                // Tentukan warna dan emoji berdasarkan emosi
                let bgColor, emoji, textColor;
                
                switch(item.emotion) {
                    case 'sangat-baik':
                        bgColor = 'bg-green-100';
                        textColor = 'text-green-700';
                        emoji = '😄';
                        break;
                    case 'baik':
                        bgColor = 'bg-green-50';
                        textColor = 'text-green-600';
                        emoji = '🙂';
                        break;
                    case 'biasa':
                        bgColor = 'bg-blue-50';
                        textColor = 'text-blue-600';
                        emoji = '😐';
                        break;
                    case 'sedih':
                        bgColor = 'bg-yellow-50';
                        textColor = 'text-yellow-600';
                        emoji = '😔';
                        break;
                    case 'cemas':
                        bgColor = 'bg-orange-50';
                        textColor = 'text-orange-600';
                        emoji = '😰';
                        break;
                    case 'marah':
                        bgColor = 'bg-red-50';
                        textColor = 'text-red-600';
                        emoji = '😡';
                        break;
                }
                
                // Format emosi untuk tampilan
                const emotionName = item.emotion.split('-').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
                
                // Buat elemen untuk setiap emosi
                const emotionElement = document.createElement('div');
                emotionElement.className = `history-item p-4 ${bgColor} rounded-lg flex items-start`;
                emotionElement.innerHTML = `
                    <div class="text-2xl mr-3">${emoji}</div>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start">
                            <h4 class="font-medium ${textColor}">${emotionName}</h4>
                            <span class="text-xs text-gray-500">${item.date} · ${item.time}</span>
                        </div>
                        ${item.note ? `<p class="text-sm text-gray-600 mt-1">${item.note}</p>` : ''}
                    </div>
                    <button onclick="deleteEmotion(${item.id})" class="ml-2 text-gray-400 hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                `;
                
                historyContainer.appendChild(emotionElement);
            });
        }
        
        // Fungsi untuk menghapus emosi
        function deleteEmotion(id) {
            if (confirm('Apakah Anda yakin ingin menghapus catatan emosi ini?')) {
                emotions = emotions.filter(item => item.id !== id);
                saveEmotionsToLocalStorage();
                renderEmotionHistory();
            }
        }
        
        // Inisialisasi saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            loadEmotionsFromLocalStorage();
            
            // Set bunga ke status normal saat pertama kali dimuat
            updateFlowerAppearance('biasa');
            
            // Tambahkan listener untuk tombol filter riwayat
            document.querySelectorAll('.flex.space-x-2 button').forEach(btn => {
                btn.addEventListener('click', function() {
                    // Toggle kelas aktif
                    document.querySelectorAll('.flex.space-x-2 button').forEach(b => {
                        b.classList.remove('bg-purple-100', 'text-purple-800');
                        b.classList.add('bg-gray-100', 'text-gray-600');
                    });
                    this.classList.remove('bg-gray-100', 'text-gray-600');
                    this.classList.add('bg-purple-100', 'text-purple-800');
                    
                    // Filter berdasarkan waktu
                    const filter = this.textContent.trim();
                    filterHistory(filter);
                });
            });
        });
        
        // Fungsi untuk memfilter riwayat berdasarkan waktu
        function filterHistory(filter) {
            const now = new Date().getTime();
            const day = 24 * 60 * 60 * 1000; // Satu hari dalam milidetik
            
            let filteredEmotions;
            
            if (filter === '7 Hari') {
                filteredEmotions = emotions.filter(item => (now - item.timestamp) <= 7 * day);
            } else if (filter === '30 Hari') {
                filteredEmotions = emotions.filter(item => (now - item.timestamp) <= 30 * day);
            } else {
                filteredEmotions = emotions;
            }
            
            const historyContainer = document.getElementById('emotion-history');
            historyContainer.innerHTML = '';
            
            if (filteredEmotions.length === 0) {
                historyContainer.innerHTML = '<div class="text-center p-6 text-gray-500">Tidak ada data emosi dalam periode ini.</div>';
                return;
            }
            
            filteredEmotions.forEach(item => {
                // Tentukan warna dan emoji berdasarkan emosi
                let bgColor, emoji, textColor;
                
                switch(item.emotion) {
                    case 'sangat-baik':
                        bgColor = 'bg-green-100';
                        textColor = 'text-green-700';
                        emoji = '😄';
                        break;
                    case 'baik':
                        bgColor = 'bg-green-50';
                        textColor = 'text-green-600';
                        emoji = '🙂';
                        break;
                    case 'biasa':
                        bgColor = 'bg-blue-50';
                        textColor = 'text-blue-600';
                        emoji = '😐';
                        break;
                    case 'sedih':
                        bgColor = 'bg-yellow-50';
                        textColor = 'text-yellow-600';
                        emoji = '😔';
                        break;
                    case 'cemas':
                        bgColor = 'bg-orange-50';
                        textColor = 'text-orange-600';
                        emoji = '😰';
                        break;
                    case 'marah':
                        bgColor = 'bg-red-50';
                        textColor = 'text-red-600';
                        emoji = '😡';
                        break;
                }
                
                // Format emosi untuk tampilan
                const emotionName = item.emotion.split('-').map(word => word.charAt(0).toUpperCase() + word.slice(1)).join(' ');
                
                // Buat elemen untuk setiap emosi
                const emotionElement = document.createElement('div');
                emotionElement.className = `history-item p-4 ${bgColor} rounded-lg flex items-start`;
                emotionElement.innerHTML = `
                    <div class="text-2xl mr-3">${emoji}</div>
                    <div class="flex-grow">
                        <div class="flex justify-between items-start">
                            <h4 class="font-medium ${textColor}">${emotionName}</h4>
                            <span class="text-xs text-gray-500">${item.date} · ${item.time}</span>
                        </div>
                        ${item.note ? `<p class="text-sm text-gray-600 mt-1">${item.note}</p>` : ''}
                    </div>
                    <button onclick="deleteEmotion(${item.id})" class="ml-2 text-gray-400 hover:text-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                        </svg>
                    </button>
                `;
                
                historyContainer.appendChild(emotionElement);
            });
        }