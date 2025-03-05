import sys
import json
import os
from dotenv import load_dotenv
# Carrega variáveis do .env
load_dotenv()

# Obtém os caminhos do .env ou usa valores padrão (caso não existam)
python_path = os.getenv("PYTHON_PATH", "C:\\Python311")
ffmpeg_path = os.getenv("FFMPEG_PATH", "C:\\ffmpeg\\bin")

# Atualiza o PATH dinamicamente
os.environ["PATH"] = f"{python_path};{ffmpeg_path};" + os.environ.get("PATH", "")

from pydub import AudioSegment
from pydub.silence import split_on_silence

def process_audio(audio_path):
    try:
        # Carrega o áudio (pydub suporta MP3, WAV, OGG, etc.)
        audio = AudioSegment.from_file(audio_path)

        # Divide o áudio com base em silêncio
        chunks = split_on_silence(audio,
                                  min_silence_len=500,  # Detecta pausas a partir de 500ms
                                  silence_thresh=audio.dBFS - 16,  # Limiar de silêncio dinâmico
                                  keep_silence=200)  # Mantém um pouco do silêncio para suavizar cortes

        timestamps = []
        current_time = 0  # Tempo acumulado em milissegundos

        for chunk in chunks:
            duration = len(chunk)  # Duração do segmento em milissegundos
            start_time = current_time / 1000.0  # Converte para segundos
            end_time = (current_time + duration) / 1000.0
            
            timestamps.append({
                'start': round(start_time, 2),  # Arredonda para evitar frações longas
                'end': round(end_time, 2)
            })

            current_time += duration  # Atualiza o tempo acumulado
        
        return timestamps

    except Exception as e:
        return {"error": str(e)}

if __name__ == "__main__":
    if len(sys.argv) < 2:
        print(json.dumps({"error": "Caminho do áudio não fornecido"}))
        sys.exit(1)

    audio_path = sys.argv[1]

    results = process_audio(audio_path)

    print(json.dumps(results))  # Retorna os resultados em JSON
